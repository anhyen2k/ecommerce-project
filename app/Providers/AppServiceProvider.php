<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{

    protected $serviceBindings = [
        'App\Services\Interfaces\UserServiceInterface' 
        => 'App\Services\UserService',
        'App\Repositories\Interfaces\UserRepositoryInterface' 
        => 'App\Repositories\UserRepository',

        'App\Services\Interfaces\UserCatalogueServiceInterface' 
        => 'App\Services\UserCatalogueService',
        'App\Repositories\Interfaces\UserCatalogueRepositoryInterface' 
        => 'App\Repositories\UserCatalogueRepository',

        'App\Services\Interfaces\LanguageServiceInterface' 
        => 'App\Services\LanguageService',
        'App\Repositories\Interfaces\LanguageRepositoryInterface' 
        => 'App\Repositories\LanguageRepository',

        'App\Services\Interfaces\GenerateServiceInterface' 
        => 'App\Services\GenerateService',
        'App\Repositories\Interfaces\GenerateRepositoryInterface' 
        => 'App\Repositories\GenerateRepository',

        'App\Services\Interfaces\PostCatalogueServiceInterface' 
        => 'App\Services\PostCatalogueService',
        'App\Repositories\Interfaces\PostCatalogueRepositoryInterface' 
        => 'App\Repositories\PostCatalogueRepository',

        'App\Services\Interfaces\PermissionServiceInterface' 
        => 'App\Services\PermissionService',
        'App\Repositories\Interfaces\PermissionRepositoryInterface' 
        => 'App\Repositories\PermissionRepository',

        'App\Repositories\Interfaces\ProvinceRepositoryInterface' => 'App\Repositories\ProvinceRepository',
        'App\Repositories\Interfaces\DistrictRepositoryInterface' => 'App\Repositories\DistrictRepository',
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->serviceBindings as $key => $val) {
            $this->app->bind($key, $val);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
