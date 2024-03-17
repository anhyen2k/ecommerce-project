<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\LanguageServiceInterface as LanguageService;
use App\Repositories\Interfaces\LanguageRepositoryInterface as LanguageRepository;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;

class LanguageController extends Controller
{
    protected $languageService;
    protected $languageRepository;

    public function __construct(
        LanguageService $languageService,
        LanguageRepository $languageRepository,
    ) {
        $this->languageService = $languageService;
        $this->languageRepository = $languageRepository;
    }

    public function index(Request $request)
    {
        $this->authorize('modules', 'language.index');
        $languages = $this->languageService->paginate($request);

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

        $config['seo'] = config('apps.language');
        $template = 'backend.language.index';

        return view('backend.dashboard.layout', compact('template', 'config', 'languages'));
    }

    public function create()
    {
        $this->authorize('modules', 'language.create');
        $config = $this->config();

        $config['seo'] = config('apps.language');
        $config['method'] = 'create';

        $template = 'backend.language.store';

        return view('backend.dashboard.layout', compact('template', 'config'));
    }

    public function store(StoreLanguageRequest $request)
    {
        if ($this->languageService->create($request)) {
            return redirect()->route('language.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('language.index')->with('error', 'Thêm mới bản ghi thất bại. Hãy thử lại');
    }

    public function edit($id) {
        $this->authorize('modules', 'language.update');
        $language = $this->languageRepository->findById($id);
        $config = $this->config();

        $config['seo'] = config('apps.language');
        $config['method'] = 'edit';

        $template = 'backend.language.store';

        return view('backend.dashboard.layout', compact('template', 'config', 'language'));
    }

    public function update($id, UpdateLanguageRequest $request) {
        if ($this->languageService->update($id, $request)) {
            return redirect()->route('language.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('language.index')->with('error', 'Cập nhật bản ghi thất bại. Hãy thử lại');
    }

    public function delete($id) {
        $this->authorize('modules', 'language.destroy');
        $config['seo'] = config('apps.language');
        $language = $this->languageRepository->findById($id);

        $template = 'backend.language.delete';

        return view('backend.dashboard.layout', compact(
            'template', 
            'config',
            'language'
        ));
    }

    public function destroy($id) {
        if ($this->languageService->destroy($id)) {
            return redirect()->route('language.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('language.index')->with('error', 'Xóa bản ghi thất bại. Hãy thử lại');
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
