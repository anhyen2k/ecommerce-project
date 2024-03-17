<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\PermissionServiceInterface as PermissionService;
use App\Repositories\Interfaces\PermissionRepositoryInterface as PermissionRepository;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;

class PermissionController extends Controller
{
    protected $permissionService;
    protected $permissionRepository;

    public function __construct(
        PermissionService $permissionService,
        PermissionRepository $permissionRepository,
    ) {
        $this->permissionService = $permissionService;
        $this->permissionRepository = $permissionRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('modules', 'permission.index');
        $permissions = $this->permissionService->paginate($request);

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

        $config['seo'] = config('apps.permission');
        $template = 'backend.permission.index';

        return view('backend.dashboard.layout', compact('template', 'config', 'permissions'));
    }

    public function create()
    {
        $this->authorize('modules', 'permission.create');
        $config = $this->config();

        $config['seo'] = config('apps.permission');
        $config['method'] = 'create';

        $template = 'backend.permission.store';

        return view('backend.dashboard.layout', compact('template', 'config'));
    }

    public function store(StorePermissionRequest $request)
    {
        if ($this->permissionService->create($request)) {
            return redirect()->route('permission.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('permission.index')->with('error', 'Thêm mới bản ghi thất bại. Hãy thử lại');
    }

    public function edit($id) {
        $this->authorize('modules', 'permission.update');
        $permission = $this->permissionRepository->findById($id);
        $config = $this->config();

        $config['seo'] = config('apps.permission');
        $config['method'] = 'edit';

        $template = 'backend.permission.store';

        return view('backend.dashboard.layout', compact('template', 'config', 'permission'));
    }

    public function update($id, UpdatePermissionRequest $request) {
        if ($this->permissionService->update($id, $request)) {
            return redirect()->route('permission.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('permission.index')->with('error', 'Cập nhật bản ghi thất bại. Hãy thử lại');
    }

    public function delete($id) {
        $this->authorize('modules', 'permission.destroy');
        $config['seo'] = config('apps.permission');
        $permission = $this->permissionRepository->findById($id);

        $template = 'backend.permission.delete';

        return view('backend.dashboard.layout', compact(
            'template', 
            'config',
            'permission'
        ));
    }

    public function destroy($id) {
        if ($this->permissionService->destroy($id)) {
            return redirect()->route('permission.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('permission.index')->with('error', 'Xóa bản ghi thất bại. Hãy thử lại');
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
