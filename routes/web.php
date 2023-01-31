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
        Route::get('administrator/archive', 'User\AdministratorController@empty')->name('web.administrator.archive');
        Route::get('administrator/about', 'User\AdministratorController@empty')->name('web.administrator.about');

        Route::get('administrator/school_year/list', 'User\AdministratorController@school_year_list')->name('web.administrator.school_year.list');
        Route::get('administrator/school_year/create', 'User\AdministratorController@school_year_create')->name('web.administrator.school_year.create');
        Route::get('administrator/school_year/update/{school_year}', 'User\AdministratorController@school_year_update')->name('web.administrator.school_year.update');
        Route::get('administrator/school_year/update/{school_year}', 'User\AdministratorController@school_year_update')->name('web.administrator.school_year.update');
        
        Route::get('administrator/semester/list', 'User\AdministratorController@semester_list')->name('web.administrator.semester.list');
        Route::get('administrator/semester/create', 'User\AdministratorController@semester_create')->name('web.administrator.semester.create');
        Route::get('administrator/semester/update/{semester}', 'User\AdministratorController@semester_update')->name('web.administrator.semester.update');

        Route::get('administrator/employee/list', 'User\AdministratorController@employee_list')->name('web.administrator.employee.list');
        Route::get('administrator/semester/update/{semester}', 'User\AdministratorController@semester_update')->name('web.administrator.semester.update');

        Route::get('administrator/employee/list', 'User\AdministratorController@employee_list')->name('web.administrator.employee.list');

        Route::get('administrator/users', 'User\AdministratorController@empty')->name('web.administrator.users');
        Route::get('administrator/users/administrator', 'User\AdministratorController@administrator')->name('web.administrator.users.administrator.index');

        Route::get('administrator/data_master/school_information/list', 'User\AdministratorController@identitas_sekolah_list')->name('web.administrator.data_master.school_information.list');
        Route::get('administrator/data_master/school_information/create', 'User\AdministratorController@identitas_sekolah_create')->name('web.administrator.data_master.school_information.create');
        Route::get('administrator/data_master/school_information/update/{id}', 'User\AdministratorController@identitas_sekolah_update')->name('web.administrator.data_master.school_information.update');
    });
});
Route::middleware(['authc.basic:welcome,administrator'])->group(function () {
    Route::post('resource/school_year', 'SchoolYearController@create')->name('web.resource.school_year.create');
    Route::patch('resource/school_year/{school_year}', 'SchoolYearController@update')->name('web.resource.school_year.update');
    Route::delete('resource/school_year/{school_year}', 'SchoolYearController@delete')->name('web.resource.school_year.delete');
    Route::delete('resource/school_year', 'SchoolYearController@delete_any')->name('web.resource.school_year.delete_any');

    Route::post('resource/school_information', 'SchoolInformationController@create')->name('web.resource.data_master.school_information.create');

    Route::post('resource/semester', 'SemesterController@create')->name('web.resource.semester.create');
    Route::patch('resource/semester/{semester}', 'SemesterController@update')->name('web.resource.semester.update');
    Route::delete('resource/semester/{semester}', 'SemesterController@delete')->name('web.resource.semester.delete');
    Route::delete('resource/semester', 'SemesterController@delete_any')->name('web.resource.semester.delete_any');
});
