<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\PostCatalogueServiceInterface as PostCatalogueService;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface as PostCatalogueRepository;
use App\Http\Requests\StorePostCatalogueRequest;
use App\Http\Requests\UpdatePostCatalogueRequest;
use App\Http\Requests\UpdatePostRequest;

class PostCatalogueController extends Controller
{
    protected $postCatalogueService;
    protected $postCatalogueRepository;

    public function __construct(
        PostCatalogueService $postCatalogueService,
        PostCatalogueRepository $postCatalogueRepository,
    ) {
        $this->postCatalogueService = $postCatalogueService;
        $this->postCatalogueRepository = $postCatalogueRepository;
    }

    public function index(Request $request)
    {
        $postCatalogues = $this->postCatalogueService->paginate($request);
        // $postsCatalogue = post::paginate(15);

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

        $config['seo'] = config('apps.postCatalogue');
        $template = 'backend.post.catalogue.index';

        return view('backend.dashboard.layout', compact('template', 'config', 'postCatalogues'));
    }

    public function create()
    {
        $config = $config = $this->config();

        $config['seo'] = config('apps.postCatalogue');
        $config['method'] = 'create';

        $template = 'backend.post.catalogue.store';

        return view('backend.dashboard.layout', compact('template', 'config'));
    }

    public function store(StorePostCatalogueRequest $request)
    {
        if ($this->postCatalogueService->create($request)) {
            return redirect()->route('post.catalogue.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('post.catalogue.index')->with('error', 'Thêm mới bản ghi thất bại. Hãy thử lại');
    }

    public function edit($id) {
        $postCatalogue = $this->postCatalogueRepository->findById($id);
        $config = $this->config();

        $config['seo'] = config('apps.postCatalogue');
        $config['method'] = 'edit';

        $template = 'backend.post.catalogue.store';

        return view('backend.dashboard.layout', compact('template', 'config', 'postCatalogue'));
    }

    public function update($id, UpdatePostCatalogueRequest $request) {
        if ($this->postCatalogueService->update($id, $request)) {
            return redirect()->route('post.catalogue.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('post.catalogue.index')->with('error', 'Cập nhật bản ghi thất bại. Hãy thử lại');
    }

    public function delete($id) {

        $config['seo'] = config('apps.postCatalogue');
        $postCatalogue = $this->postCatalogueRepository->findById($id);

        $template = 'backend.post.catalogue.delete';

        return view('backend.dashboard.layout', compact(
            'template', 
            'config',
            'postCatalogue'
        ));
    }

    public function destroy($id) {
        if ($this->postCatalogueService->destroy($id)) {
            return redirect()->route('post.catalogue.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('post.catalogue.index')->with('error', 'Xóa bản ghi thất bại. Hãy thử lại');
    }

    private function config() {
        return [
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'library/location.js',
                'plugin/ckfinder_2/ckfinder.js',
                'plugin/ckeditor/ckeditor.js',
                'library/finder.js',
            ],
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ]
        ];
    }
}
