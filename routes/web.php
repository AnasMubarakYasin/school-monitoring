<?php

use Illuminate\Support\Facades\Route;

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
})->name('welcome');
Route::get('/locale/{locale}', 'Locale@set')->name('web.locale.set');
Route::middleware('authc.guest:web.administrator.dashboard,administrator')->group(function () {
    Route::middleware('locale:en')->group(function () {
        Route::get('administrator/login', 'Auth\AdministratorController@login_show')->name('web.administrator.login_show');
    });
    Route::post('administrator/login', 'Auth\AdministratorController@login_perfom')->name('web.administrator.login_perform');
});
Route::middleware(['authc.basic:welcome,administrator'])->group(function () {
    Route::middleware(['locale', 'view.share'])->group(function () {
        Route::get('administrator/dashboard', 'User\AdministratorController@dashboard')->name('web.administrator.dashboard');
        Route::get('administrator/profile', 'User\AdministratorController@profile')->name('web.administrator.profile');
        Route::get('administrator/notification', 'User\AdministratorController@notification')->name('web.administrator.notification');
        Route::get('administrator/empty', 'User\AdministratorController@empty')->name('web.administrator.empty');
        Route::get('administrator/logout', 'Auth\AdministratorController@logout_perfom')->name('web.administrator.logout_perfom');
        Route::get('administrator/archive', 'User\AdministratorController@dashboard')->name('web.administrator.archive');
        Route::get('administrator/about', 'User\AdministratorController@dashboard')->name('web.administrator.about');
    });
});
