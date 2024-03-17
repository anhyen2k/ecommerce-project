<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Ajax\DashboardController as AjaxDashboardController;
use App\Http\Controllers\Backend\UserCatalogueController;
use App\Http\Controllers\Backend\PostCatalogueController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\GenerateController;
use App\Http\Controllers\Ajax\LocationController;
use App\Http\Middleware\AuthenticateMiddleware;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Backend routes
Route::get('dashboard/index', [DashboardController::class, 'index'])->name
('dashboard.layout')->middleware('logout');

// User routes
Route::group(['prefix' => 'user'], function() {
    Route::get('index', [UserController::class, 'index'])->name
    ('user.index')->middleware('logout');
    Route::get('create', [UserController::class, 'create'])->name
    ('user.create')->middleware('logout');
    Route::post('store', [UserController::class, 'store'])->name
    ('user.store')->middleware('logout');
    Route::get('edit/{id}', [UserController::class, 'edit'])->where(['id' => '[0-9]+'])->name
    ('user.edit')->middleware('logout');
    Route::post('update/{id}', [UserController::class, 'update'])->where(['id' => '[0-9]+'])->name
    ('user.update')->middleware('logout');
    Route::get('delete/{id}', [UserController::class, 'delete'])->where(['id' => '[0-9]+'])->name
    ('user.delete')->middleware('logout');
    Route::delete('destroy/{id}', [UserController::class, 'destroy'])->where(['id' => '[0-9]+'])->name
    ('user.destroy')->middleware('logout');
});

// UserCatalogue routes
Route::group(['prefix' => 'user/catalogue'], function() {
    Route::get('index', [UserCatalogueController::class, 'index'])->name
    ('user.catalogue.index')->middleware('logout');
    Route::get('create', [UserCatalogueController::class, 'create'])->name
    ('user.catalogue.create')->middleware('logout');
    Route::post('store', [UserCatalogueController::class, 'store'])->name
    ('user.catalogue.store')->middleware('logout');
    Route::get('edit/{id}', [UserCatalogueController::class, 'edit'])->where(['id' => '[0-9]+'])->name
    ('user.catalogue.edit')->middleware('logout');
    Route::post('update/{id}', [UserCatalogueController::class, 'update'])->where(['id' => '[0-9]+'])->name
    ('user.catalogue.update')->middleware('logout');
    Route::get('delete/{id}', [UserCatalogueController::class, 'delete'])->where(['id' => '[0-9]+'])->name
    ('user.catalogue.delete')->middleware('logout');
    Route::delete('destroy/{id}', [UserCatalogueController::class, 'destroy'])->where(['id' => '[0-9]+'])->name
    ('user.catalogue.destroy')->middleware('logout');
    Route::get('permission', [UserCatalogueController::class, 'permission'])->name
    ('user.catalogue.permission')->middleware('logout');
    Route::post('updatePermission', [UserCatalogueController::class, 'updatePermission'])->name
    ('user.catalogue.updatePermission')->middleware('logout');
});

// Language routes
Route::group(['prefix' => 'language'], function() {
    Route::get('index', [LanguageController::class, 'index'])->name
    ('language.index')->middleware('logout');
    Route::get('create', [LanguageController::class, 'create'])->name
    ('language.create')->middleware('logout');
    Route::post('store', [LanguageController::class, 'store'])->name
    ('language.store')->middleware('logout');
    Route::get('edit/{id}', [LanguageController::class, 'edit'])->where(['id' => '[0-9]+'])->name
    ('language.edit')->middleware('logout');
    Route::post('update/{id}', [LanguageController::class, 'update'])->where(['id' => '[0-9]+'])->name
    ('language.update')->middleware('logout');
    Route::get('delete/{id}', [LanguageController::class, 'delete'])->where(['id' => '[0-9]+'])->name
    ('language.delete')->middleware('logout');
    Route::delete('destroy/{id}', [LanguageController::class, 'destroy'])->where(['id' => '[0-9]+'])->name
    ('language.destroy')->middleware('logout');
});

// Generate routes
Route::group(['prefix' => 'generate'], function() {
    Route::get('index', [GenerateController::class, 'index'])->name
    ('generate.index')->middleware('logout');
    Route::get('create', [GenerateController::class, 'create'])->name
    ('generate.create')->middleware('logout');
    Route::post('store', [GenerateController::class, 'store'])->name
    ('generate.store')->middleware('logout');
    Route::get('edit/{id}', [GenerateController::class, 'edit'])->where(['id' => '[0-9]+'])->name
    ('generate.edit')->middleware('logout');
    Route::post('update/{id}', [GenerateController::class, 'update'])->where(['id' => '[0-9]+'])->name
    ('generate.update')->middleware('logout');
    Route::get('delete/{id}', [GenerateController::class, 'delete'])->where(['id' => '[0-9]+'])->name
    ('generate.delete')->middleware('logout');
    Route::delete('destroy/{id}', [GenerateController::class, 'destroy'])->where(['id' => '[0-9]+'])->name
    ('generate.destroy')->middleware('logout');
});

// PostCatalogue routes
Route::group(['prefix' => 'post/catalogue'], function() {
    Route::get('index', [PostCatalogueController::class, 'index'])->name
    ('post.catalogue.index')->middleware('logout');
    Route::get('create', [PostCatalogueController::class, 'create'])->name
    ('post.catalogue.create')->middleware('logout');
    Route::post('store', [PostCatalogueController::class, 'store'])->name
    ('post.catalogue.store')->middleware('logout');
    Route::get('edit/{id}', [PostCatalogueController::class, 'edit'])->where(['id' => '[0-9]+'])->name
    ('post.catalogue.edit')->middleware('logout');
    Route::post('update/{id}', [PostCatalogueController::class, 'update'])->where(['id' => '[0-9]+'])->name
    ('post.catalogue.update')->middleware('logout');
    Route::get('delete/{id}', [PostCatalogueController::class, 'delete'])->where(['id' => '[0-9]+'])->name
    ('post.catalogue.delete')->middleware('logout');
    Route::delete('destroy/{id}', [PostCatalogueController::class, 'destroy'])->where(['id' => '[0-9]+'])->name
    ('post.catalogue.destroy')->middleware('logout');
});

// Language routes
Route::group(['prefix' => 'permission'], function() {
    Route::get('index', [PermissionController::class, 'index'])->name
    ('permission.index')->middleware('logout');
    Route::get('create', [PermissionController::class, 'create'])->name
    ('permission.create')->middleware('logout');
    Route::post('store', [PermissionController::class, 'store'])->name
    ('permission.store')->middleware('logout');
    Route::get('edit/{id}', [PermissionController::class, 'edit'])->where(['id' => '[0-9]+'])->name
    ('permission.edit')->middleware('logout');
    Route::post('update/{id}', [PermissionController::class, 'update'])->where(['id' => '[0-9]+'])->name
    ('permission.update')->middleware('logout');
    Route::get('delete/{id}', [PermissionController::class, 'delete'])->where(['id' => '[0-9]+'])->name
    ('permission.delete')->middleware('logout');
    Route::delete('destroy/{id}', [PermissionController::class, 'destroy'])->where(['id' => '[0-9]+'])->name
    ('permission.destroy')->middleware('logout');
});

// AJAX routes
Route::get('/ajax/location/getLocation', [LocationController::class, 'getLocation'])->name
('ajax.location.index')->middleware('logout');
Route::post('/ajax/dashboard/changeStatus', [AjaxDashboardController::class, 'changeStatus'])->name
('ajax.dashboard.changeStatus')->middleware('logout');

Route::get('admin', [AuthController::class, 'index'])->name
('auth.admin')->middleware('login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');