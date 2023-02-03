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
Route::patch('/notification/{notification}/mark', 'Notification@mark')->name('web.notification.mark');
Route::get('/notification/{notification}/read', 'Notification@read')->name('web.notification.read');
Route::delete('/notification/{notification}/delete', 'Notification@delete')->name('web.notification.delete');
Route::patch('/notification/mark_all', 'Notification@mark_all')->name('web.notification.mark_all');
Route::delete('/notification/delete_all', 'Notification@delete_all')->name('web.notification.delete_all');
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
        Route::get('administrator/school_year/{school_year}/update', 'User\AdministratorController@school_year_update')->name('web.administrator.school_year.update');

        Route::get('administrator/semester/list', 'User\AdministratorController@semester_list')->name('web.administrator.semester.list');
        Route::get('administrator/semester/create', 'User\AdministratorController@semester_create')->name('web.administrator.semester.create');
        Route::get('administrator/semester/{semester}/update', 'User\AdministratorController@semester_update')->name('web.administrator.semester.update');

        Route::get('administrator/users', 'User\AdministratorController@empty')->name('web.administrator.users');
        Route::get('administrator/users/administrator', 'User\AdministratorController@administrator')->name('web.administrator.users.administrator.list');

        Route::get('administrator/users/employee/list', 'User\AdministratorController@employee_list')->name('web.administrator.users.employee.list');
        Route::get('administrator/users/employee/create', 'User\AdministratorController@employee_create')->name('web.administrator.users.employee.create');
        Route::get('administrator/users/employee/{employee}/update', 'User\AdministratorController@employee_update')->name('web.administrator.users.employee.update');

        Route::get('administrator/data_master', 'User\AdministratorController@empty')->name('web.administrator.data_master');

        Route::get('administrator/users/student/list', 'User\AdministratorController@student_list')->name('web.administrator.users.student.list');
        Route::get('administrator/users/student/create', 'User\AdministratorController@student_create')->name('web.administrator.users.student.create');
        Route::get('administrator/users/student/{student}/update', 'User\AdministratorController@student_update')->name('web.administrator.users.student.update');

        Route::get('administrator/major/list', 'User\AdministratorController@major_list')->name('web.administrator.major.list');
        Route::get('administrator/major/create', 'User\AdministratorController@major_create')->name('web.administrator.major.create');
        Route::get('administrator/major/{major}/update', 'User\AdministratorController@major_update')->name('web.administrator.major.update');

        Route::get('administrator/classroom/list', 'User\AdministratorController@classroom_list')->name('web.administrator.classroom.list');
        Route::get('administrator/classroom/create', 'User\AdministratorController@classroom_create')->name('web.administrator.classroom.create');
        Route::get('administrator/classroom/{classroom}/update', 'User\AdministratorController@classroom_update')->name('web.administrator.classroom.update');

        Route::get('administrator/data_master/school_information/list', 'User\AdministratorController@identitas_sekolah_list')->name('web.administrator.data_master.school_information.list');
        Route::get('administrator/data_master/school_information/create', 'User\AdministratorController@identitas_sekolah_create')->name('web.administrator.data_master.school_information.create');
        Route::get('administrator/data_master/school_information/update/{schoolInformation}', 'User\AdministratorController@identitas_sekolah_update')->name('web.administrator.data_master.school_information.update');

        Route::get('administrator/data_master/facilityandinfrastructure/list', 'User\AdministratorController@facilityandinfrastructure_list')->name('web.administrator.data_master.facilityandinfrastructure.list');
        Route::get('administrator/data_master/facilityandinfrastructure/create', 'User\AdministratorController@facilityandinfrastructure_create')->name('web.administrator.data_master.facilityandinfrastructure.create');
        Route::get('administrator/data_master/facilityandinfrastructure/{facilityAndInfrastructure}/update', 'User\AdministratorController@facilityandinfrastructure_update')->name('web.administrator.data_master.facilityandinfrastructure.update');
    });
});
Route::middleware(['authc.basic:welcome,administrator'])->group(function () {
    Route::post('resource/school_year', 'SchoolYearController@create')->name('web.resource.school_year.create');
    Route::patch('resource/school_year/{school_year}', 'SchoolYearController@update')->name('web.resource.school_year.update');
    Route::delete('resource/school_year/{school_year}', 'SchoolYearController@delete')->name('web.resource.school_year.delete');
    Route::delete('resource/school_year', 'SchoolYearController@delete_any')->name('web.resource.school_year.delete_any');

    Route::post('resource/school_information', 'SchoolInformationController@create')->name('web.resource.data_master.school_information.create');
    Route::patch('resource/school_information/{schoolInformation}', 'SchoolInformationController@update')->name('web.resource.data_master.school_information.update');

    Route::post('resource/facilityAndInfrastructure', 'FacilityAndInfrastructureController@create')->name('web.resource.data_master.facilityAndInfrastructure.create');
    Route::patch('resource/facilityAndInfrastructure/{facilityAndInfrastructure}', 'FacilityAndInfrastructureController@update')->name('web.resource.data_master.facilityAndInfrastructure.update');
    Route::delete('resource/facilityAndInfrastructure/{facilityAndInfrastructure}', 'FacilityAndInfrastructureController@delete')->name('web.resource.data_master.facilityAndInfrastructure.delete');
    Route::delete('resource/facilityAndInfrastructure', 'FacilityAndInfrastructureController@delete_any')->name('web.resource.data_master.facilityAndInfrastructure.delete_any');

    Route::post('resource/semester', 'SemesterController@create')->name('web.resource.semester.create');
    Route::patch('resource/semester/{semester}', 'SemesterController@update')->name('web.resource.semester.update');
    Route::delete('resource/semester/{semester}', 'SemesterController@delete')->name('web.resource.semester.delete');
    Route::delete('resource/semester', 'SemesterController@delete_any')->name('web.resource.semester.delete_any');

    Route::post('resource/employee', 'EmployeeController@create')->name('web.resource.employee.create');
    Route::patch('resource/employee/{employee}', 'EmployeeController@update')->name('web.resource.employee.update');
    Route::delete('resource/employee/{employee}', 'EmployeeController@delete')->name('web.resource.employee.delete');
    Route::delete('resource/employee', 'EmployeeController@delete_any')->name('web.resource.employee.delete_any');

    Route::post('resource/major', 'MajorController@create')->name('web.resource.major.create');
    Route::patch('resource/major/{major}', 'MajorController@update')->name('web.resource.major.update');
    Route::delete('resource/major/{major}', 'MajorController@delete')->name('web.resource.major.delete');
    Route::delete('resource/major', 'MajorController@delete_any')->name('web.resource.major.delete_any');

    Route::post('resource/classroom', 'ClassroomController@create')->name('web.resource.classroom.create');
    Route::patch('resource/classroom/{classroom}', 'ClassroomController@update')->name('web.resource.classroom.update');
    Route::delete('resource/classroom/{classroom}', 'ClassroomController@delete')->name('web.resource.classroom.delete');
    Route::delete('resource/classroom', 'ClassroomController@delete_any')->name('web.resource.classroom.delete_any');

    Route::post('resource/student', 'StudentController@create')->name('web.resource.student.create');
    Route::patch('resource/student/{student}', 'StudentController@update')->name('web.resource.student.update');
    Route::delete('resource/student/{student}', 'StudentController@delete')->name('web.resource.student.delete');
    Route::delete('resource/student', 'StudentController@delete_any')->name('web.resource.student.delete_any');
});
