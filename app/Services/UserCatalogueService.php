<?php

namespace App\Services;

use App\Services\Interfaces\UserCatalogueServiceInterface;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

/**
 * Class UserCatalogueService
 * @package App\Services
 */
class UserCatalogueService implements UserCatalogueServiceInterface
{
    protected $userCatalogueRepository;

    public function __construct(UserCatalogueRepository $userCatalogueRepository)
    {
        $this->userCatalogueRepository = $userCatalogueRepository;
    }

    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $perPage = $request->integer('perpage');
        $userCatalogues = $this->userCatalogueRepository->pagination(
            $this->paginateSelect(), $condition, [],
            ['path' => 'user/catalogue/index'], 
            $perPage, ['users']);
        return $userCatalogues;
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except('_token', 'send');
            $user = $this->userCatalogueRepository->create($payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except('_token', 'send');
            $user = $this->userCatalogueRepository->update($id, $payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }

    public function destroy($id) {
        DB::beginTransaction();
        try {
            $user = $this->userCatalogueRepository->delete($id);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }

    public function updateStatus($post = []) {
        DB::beginTransaction();
        try {
            $payload = [
                $post ['field'] => (($post['value'] == 1)?2:1)
            ];
            $user = $this->userCatalogueRepository->update($post['modelId'], $payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }
    }

    public function converBirthdayDate($birthday = '') {
        $carbonDate = Carbon::createFromFormat('Y-m-d', $birthday);
        $birthday = $carbonDate->format('Y-m-d H:i:s');
        return $birthday;
    }

    public function setPermission($request) {
        DB::beginTransaction();
        try {
            $permissions = $request->input('permission');
            if(count($permissions)) { // --> moi chay doan nay de sync du lieu cho cac nhom duo osst len
                foreach ($permissions as $key => $val) { // --> khi du so phan tu thi co phai cho nay loop qua 2 lan thi no sẽ sync cho ca 2 nhom dun dungko
                    $userCatalogue = $this->userCatalogueRepository->findById($key);
                    $userCatalogue->permissions()->detach();
                    $userCatalogue->permissions()->sync($val);
                }
                /*
                    Gia su 1 nhom ko post len dan den mang pẻmission chi co 1 phan tu
                    thi co phai cai nhom con lai la ko con quyen gi --> neu ko con quyen gi thi phai xôa toan bo quyen cua cai nhom day di
                    dung ko

                    Hien tai trong database dang lưu quyen cua cai nhom cong tac vien duoi dang ban ghi 
                    2 - 1 -> bi xoa ne no mat
                    2 - 3 
                    trong dâtbase

                    boi vi cai nhom 2 nay sau do ko duoc post len --> phai xoa duoc 2 ban ghi nay di


                    --> neu bo 1 phan tu thi no van se sync duoc du lieu vao bang pivot



                    dau tien phai lay ra tat ca cac nhom thanh vien co trong database
                    -- sau khi chay cau truy van do se lay ra duoc 2 cai id la : 1 va 2
                    // --> khi post du lieu len cai mang permission se chi co 1 cai id: 1
                    // --> Dua vao mang 1 va mang 2 se lay duoc cac phan tu khong giong nhau cua 2 mang: [2] ->> chinh la so 2
                    // --> sau do loop qua cai mang nay de detach toan bo du lieu trong bang pivot 

                    foreach($mangCocacacphantukhacnhau as $key => $val){
                        // cai value chinh la cai id
                        $userCatalogue = $this->userCatalogue->findById($val)
                        $userCatalogue->permisions()->detach();
                        

                    }  ---> Doan nay no se detach toan bo tat ca ban ghi cua cac cai usratalogue ma ko duoc osst len sau do 
                
                */
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
            return false;
        }

        // mục đích đưa đượn dữ liệu vào bảng user_catalogue_permission
    }

    public function paginateSelect() {
        return [
            'id',
            'name',
            'description',
            'publish',
        ];
    }
}
