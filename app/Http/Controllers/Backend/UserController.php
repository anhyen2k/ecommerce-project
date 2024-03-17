<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    protected $userService;
    protected $proviceRepository;
    protected $districtRepository;
    protected $userRepository;

    public function __construct(
        UserService $userService,
        ProvinceRepository $proviceRepository,
        UserRepository $userRepository,
    ) {
        $this->userService = $userService;
        $this->proviceRepository = $proviceRepository;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('modules', 'user.index');
        $users = $this->userService->paginate($request);

        // $users = User::paginate(15);

        $config = [
            'js' => [
                'js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            ],
            'css' => [
                'css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
        ];

        $config['seo'] = config('apps.user');
        $template = 'backend.user.user.index';

        return view('backend.dashboard.layout', compact('template', 'config', 'users'));
    }

    public function create()
    {   
        $this->authorize('modules', 'user.create');
        $provinces = $this->proviceRepository->all();

        $config = $this->config();

        $config['seo'] = config('apps.user');
        $config['method'] = 'create';

        $template = 'backend.user.user.store';

        return view('backend.dashboard.layout', compact('template', 'config', 'provinces'));
    }

    public function store(StoreUserRequest $request)
    {
        if ($this->userService->create($request)) {
            return redirect()->route('user.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Thêm mới bản ghi thất bại. Hãy thử lại');
    }

    public function edit($id) {
        $this->authorize('modules', 'user.update');
        $user = $this->userRepository->findById($id);
        
        $provinces = $this->proviceRepository->all();

        $config = $this->config();

        $config['seo'] = config('apps.user');
        $config['method'] = 'edit';

        $template = 'backend.user.user.store';

        return view('backend.dashboard.layout', compact('template', 'config', 'provinces', 'user'));
    }

    public function update($id, UpdateUserRequest $request) {
        if ($this->userService->update($id, $request)) {
            return redirect()->route('user.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Cập nhật bản ghi thất bại. Hãy thử lại');
    }

    public function delete($id) {
        $this->authorize('modules', 'user.destroy');
        $config['seo'] = config('apps.user');
        $user = $this->userRepository->findById($id);

        $template = 'backend.user.user.delete';

        return view('backend.dashboard.layout', compact(
            'template', 
            'config',
            'user'
        ));
        
    }

    public function destroy($id) {
        if ($this->userService->destroy($id)) {
            return redirect()->route('user.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('user.index')->with('error', 'Xóa bản ghi thất bại. Hãy thử lại');
    }
    
    private function config() {
        return [
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'library/location.js',
                'plugin/ckfinder_2/ckfinder.js',
                'library/finder.js',
            ],
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ]
        ];
    }
}
