<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserCatalogueServiceInterface as UserCatalogueService;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface as UserCatalogueRepository;
use App\Repositories\Interfaces\PermissionRepositoryInterface as PermissionRepository;
use App\Http\Requests\StoreUserCatalogueRequest;
use App\Http\Requests\UpdateUserCatalogueRequest;
use App\Http\Requests\UpdateUserRequest;

class UserCatalogueController extends Controller
{
    protected $userCatalogueService;
    protected $userCatalogueRepository;
    protected $permissionRepository;

    public function __construct(
        UserCatalogueService $userCatalogueService,
        UserCatalogueRepository $userCatalogueRepository,
        PermissionRepository $permissionRepository,
    ) {
        $this->userCatalogueService = $userCatalogueService;
        $this->userCatalogueRepository = $userCatalogueRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('modules', 'user.catalogue.index');
        $userCatalogues = $this->userCatalogueService->paginate($request);

        // $usersCatalogue = User::paginate(15);

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

        $config['seo'] = config('apps.userCatalogue');
        $template = 'backend.user.catalogue.index';

        return view('backend.dashboard.layout', compact('template', 'config', 'userCatalogues'));
    }

    public function create()
    {
        $this->authorize('modules', 'user.catalogue.create');
        $config = [
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

        $config['seo'] = config('apps.user');
        $config['method'] = 'create';

        $template = 'backend.user.catalogue.store';

        return view('backend.dashboard.layout', compact('template', 'config'));
    }

    public function store(StoreUserCatalogueRequest $request)
    {
        if ($this->userCatalogueService->create($request)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error', 'Thêm mới bản ghi thất bại. Hãy thử lại');
    }

    public function edit($id) {
        $this->authorize('modules', 'user.catalogue.update');
        $userCatalogue = $this->userCatalogueRepository->findById($id);
        $config = [
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

        $config['seo'] = config('apps.user');
        $config['method'] = 'edit';

        $template = 'backend.user.catalogue.store';

        return view('backend.dashboard.layout', compact('template', 'config', 'userCatalogue'));
    }

    public function update($id, UpdateUserCatalogueRequest $request) {
        if ($this->userCatalogueService->update($id, $request)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error', 'Cập nhật bản ghi thất bại. Hãy thử lại');
    }

    public function delete($id) {
        $this->authorize('modules', 'user.catalogue.destroy');
        $config['seo'] = config('apps.userCatalogue');
        $userCatalogue = $this->userCatalogueRepository->findById($id);

        $template = 'backend.user.catalogue.delete';

        return view('backend.dashboard.layout', compact(
            'template', 
            'config',
            'userCatalogue'
        ));
    }

    public function destroy($id) {
        if ($this->userCatalogueService->destroy($id)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error', 'Xóa bản ghi thất bại. Hãy thử lại');
    }

    public function permission() {
        $userCatalogues = $this->userCatalogueRepository->all(['permissions']);
        
        $permissions = $this->permissionRepository->all();
        $template = 'backend.user.catalogue.permission';
        $config['seo'] = config('apps.permission');
        return view('backend.dashboard.layout', compact(
            'template', 
            'userCatalogues',
            'permissions',
            'config',
        ));
    }

    public function updatePermission(Request $request) {
        if($this->userCatalogueService->setPermission($request)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Cập nhật quyền thành công');
        }
        return redirect()->route('user.catalogue.index')->with('error', 'Có vấn đề sảy ra. Hãy thử lại');
    }
}
