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
    return view('landing');
})->name('welcome');
Route::get('/locale/{locale}', 'Locale@set')->name('web.locale.set');
Route::patch('/notification/{notification}/mark', 'Notification@mark')->name('web.notification.mark');
Route::get('/notification/{notification}/read', 'Notification@read')->name('web.notification.read');
Route::delete('/notification/{notification}/delete', 'Notification@delete')->name('web.notification.delete');
Route::patch('/notification/mark_all', 'Notification@mark_all')->name('web.notification.mark_all');
Route::delete('/notification/delete_all', 'Notification@delete_all')->name('web.notification.delete_all');
/** SECTION - Administrator */
Route::redirect('/administrator', '/administrator/dashboard');
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
        Route::get('administrator/offline', 'User\AdministratorController@offline')->name('web.administrator.offline');
        Route::get('administrator/empty', 'User\AdministratorController@empty')->name('web.administrator.empty');
        Route::get('administrator/logout', 'Auth\AdministratorController@logout_perfom')->name('web.administrator.logout_perfom');
        Route::get('administrator/archive', 'User\AdministratorController@empty')->name('web.administrator.archive');
        Route::get('administrator/about', 'User\AdministratorController@empty')->name('web.administrator.about');

        /** SECTION - User */
        Route::get('administrator/users', 'User\AdministratorController@empty')->name('web.administrator.users');

        Route::get('administrator/users/administrator', 'User\AdministratorController@administrator')->name('web.administrator.users.administrator.list');

        Route::get('administrator/users/employee/list', 'User\AdministratorController@employee_list')->name('web.administrator.users.employee.list');
        Route::get('administrator/users/employee/create', 'User\AdministratorController@employee_create')->name('web.administrator.users.employee.create');
        Route::get('administrator/users/employee/{employee}/update', 'User\AdministratorController@employee_update')->name('web.administrator.users.employee.update');

        Route::get('administrator/users/student/list', 'User\AdministratorController@student_list')->name('web.administrator.users.student.list');
        Route::get('administrator/users/student/create', 'User\AdministratorController@student_create')->name('web.administrator.users.student.create');
        Route::get('administrator/users/student/{student}/update', 'User\AdministratorController@student_update')->name('web.administrator.users.student.update');
        /** !SECTION - User */

        /** SECTION - Master */
        Route::get('administrator/data_master', 'User\AdministratorController@empty')->name('web.administrator.data_master');

        Route::get('administrator/data_master/major/list', 'User\AdministratorController@major_list')->name('web.administrator.data_master.major.list');
        Route::get('administrator/data_master/major/create', 'User\AdministratorController@major_create')->name('web.administrator.data_master.major.create');
        Route::get('administrator/data_master/major/{major}/update', 'User\AdministratorController@major_update')->name('web.administrator.data_master.major.update');

        Route::get('administrator/data_master/classroom/list', 'User\AdministratorController@classroom_list')->name('web.administrator.data_master.classroom.list');
        Route::get('administrator/data_master/classroom/create', 'User\AdministratorController@classroom_create')->name('web.administrator.data_master.classroom.create');
        Route::get('administrator/data_master/classroom/{classroom}/update', 'User\AdministratorController@classroom_update')->name('web.administrator.data_master.classroom.update');

        Route::get('administrator/data_master/school_information/list', 'User\AdministratorController@identitas_sekolah_list')->name('web.administrator.data_master.school_information.list');
        Route::get('administrator/data_master/school_information/create', 'User\AdministratorController@identitas_sekolah_create')->name('web.administrator.data_master.school_information.create');
        Route::get('administrator/data_master/school_information/update/{schoolInformation}', 'User\AdministratorController@identitas_sekolah_update')->name('web.administrator.data_master.school_information.update');

        Route::get('administrator/data_master/facilityandinfrastructure/list', 'User\AdministratorController@facilityandinfrastructure_list')->name('web.administrator.data_master.facilityandinfrastructure.list');
        Route::get('administrator/data_master/facilityandinfrastructure/create', 'User\AdministratorController@facilityandinfrastructure_create')->name('web.administrator.data_master.facilityandinfrastructure.create');
        Route::get('administrator/data_master/facilityandinfrastructure/{facilityAndInfrastructure}/update', 'User\AdministratorController@facilityandinfrastructure_update')->name('web.administrator.data_master.facilityandinfrastructure.update');
        /** !SECTION - Master */

        /** SECTION - Academic */
        Route::get('administrator/academic_data', 'User\AdministratorController@empty')->name('web.administrator.academic_data');

        Route::get('administrator/academic_data/school_year/list', 'User\AdministratorController@school_year_list')->name('web.administrator.academic_data.school_year.list');
        Route::get('administrator/academic_data/school_year/create', 'User\AdministratorController@school_year_create')->name('web.administrator.academic_data.school_year.create');
        Route::get('administrator/academic_data/school_year/{school_year}/update', 'User\AdministratorController@school_year_update')->name('web.administrator.academic_data.school_year.update');

        Route::get('administrator/academic_data/semester/list', 'User\AdministratorController@semester_list')->name('web.administrator.academic_data.semester.list');
        Route::get('administrator/academic_data/semester/create', 'User\academic_data.AdministratorController@semester_create')->name('web.administrator.academic_data.semester.create');
        Route::get('administrator/academic_data/semester/{semester}/update', 'User\AdministratorController@semester_update')->name('web.administrator.academic_data.semester.update');

        Route::get('administrator/academic_data/subjects/list', 'User\AdministratorController@subjects_list')->name('web.administrator.academic_data.subjects.list');
        Route::get('administrator/academic_data/subjects/create', 'User\AdministratorController@subjects_create')->name('web.administrator.academic_data.subjects.create');
        Route::get('administrator/academic_data/subjects/{subjects}/update', 'User\AdministratorController@subjects_update')->name('web.administrator.academic_data.subjects.update');

        Route::get('administrator/academic_data/scheduleofsubjects/list', 'User\AdministratorController@scheduleofsubjects_list')->name('web.administrator.academic_data.scheduleofsubjects.list');
        Route::get('administrator/academic_data/scheduleofsubjects/create', 'User\AdministratorController@scheduleofsubjects_create')->name('web.administrator.academic_data.scheduleofsubjects.create');
        Route::get('administrator/academic_data/scheduleofsubjects/{scheduleOfSubjects}/update', 'User\AdministratorController@scheduleofsubjects_update')->name('web.administrator.academic_data.scheduleofsubjects.update');

        Route::get('administrator/academic_data/materialandassignment/list', 'User\AdministratorController@materialandassignment_list')->name('web.administrator.academic_data.materialandassignment.list');
        Route::get('administrator/academic_data/materialandassignment/create', 'User\AdministratorController@materialandassignment_create')->name('web.administrator.academic_data.materialandassignment.create');
        Route::get('administrator/academic_data/materialandassignment/{materialAndAssignment}/update', 'User\AdministratorController@materialandassignment_update')->name('web.administrator.academic_data.materialandassignment.update');
        /** !SECTION - Academic */
    });
});
/** !SECTION - Administrator */
/** SECTION - Teacher */
Route::redirect('/teacher', '/teacher/dashboard');
Route::middleware('authc.guest:web.teacher.dashboard,employee')->group(function () {
    Route::middleware('locale:en')->group(function () {
        Route::get('teacher/login', 'Auth\TeacherController@login_show')->name('web.teacher.login_show');
    });
    Route::post('teacher/login', 'Auth\TeacherController@login_perfom')->name('web.teacher.login_perform');
});
Route::middleware(['authc.basic:welcome,employee'])->group(function () {
    Route::middleware(['locale', 'view.share'])->group(function () {
        Route::get('teacher/dashboard', 'User\TeacherController@dashboard')->name('web.teacher.dashboard');
        Route::get('teacher/profile', 'User\TeacherController@profile')->name('web.teacher.profile');
        Route::get('teacher/notification', 'User\TeacherController@notification')->name('web.teacher.notification');
        Route::get('teacher/offline', 'User\TeacherController@offline')->name('web.teacher.offline');
        Route::get('teacher/empty', 'User\TeacherController@empty')->name('web.teacher.empty');
        Route::get('teacher/logout', 'Auth\TeacherController@logout_perfom')->name('web.teacher.logout_perfom');
        Route::get('teacher/archive', 'User\TeacherController@empty')->name('web.teacher.archive');
        Route::get('teacher/about', 'User\TeacherController@empty')->name('web.teacher.about');

        /** SECTION - User */
        Route::get('teacher/users', 'User\TeacherController@empty')->name('web.teacher.users');

        Route::get('teacher/users/teacher', 'User\TeacherController@teacher')->name('web.teacher.users.teacher.list');

        Route::get('teacher/users/employee/list', 'User\TeacherController@employee_list')->name('web.teacher.users.employee.list');
        Route::get('teacher/users/employee/create', 'User\TeacherController@employee_create')->name('web.teacher.users.employee.create');
        Route::get('teacher/users/employee/{employee}/update', 'User\TeacherController@employee_update')->name('web.teacher.users.employee.update');

        Route::get('teacher/users/student/list', 'User\TeacherController@student_list')->name('web.teacher.users.student.list');
        Route::get('teacher/users/student/create', 'User\TeacherController@student_create')->name('web.teacher.users.student.create');
        Route::get('teacher/users/student/{student}/update', 'User\TeacherController@student_update')->name('web.teacher.users.student.update');
        /** !SECTION - User */

        /** SECTION - Master */
        Route::get('teacher/data_master', 'User\TeacherController@empty')->name('web.teacher.data_master');

        Route::get('teacher/data_master/major/list', 'User\TeacherController@major_list')->name('web.teacher.data_master.major.list');
        Route::get('teacher/data_master/major/create', 'User\TeacherController@major_create')->name('web.teacher.data_master.major.create');
        Route::get('teacher/data_master/major/{major}/update', 'User\TeacherController@major_update')->name('web.teacher.data_master.major.update');

        Route::get('teacher/data_master/classroom/list', 'User\TeacherController@classroom_list')->name('web.teacher.data_master.classroom.list');
        Route::get('teacher/data_master/classroom/create', 'User\TeacherController@classroom_create')->name('web.teacher.data_master.classroom.create');
        Route::get('teacher/data_master/classroom/{classroom}/update', 'User\TeacherController@classroom_update')->name('web.teacher.data_master.classroom.update');

        Route::get('teacher/data_master/school_information/list', 'User\TeacherController@identitas_sekolah_list')->name('web.teacher.data_master.school_information.list');
        Route::get('teacher/data_master/school_information/create', 'User\TeacherController@identitas_sekolah_create')->name('web.teacher.data_master.school_information.create');
        Route::get('teacher/data_master/school_information/update/{schoolInformation}', 'User\TeacherController@identitas_sekolah_update')->name('web.teacher.data_master.school_information.update');

        Route::get('teacher/data_master/facilityandinfrastructure/list', 'User\TeacherController@facilityandinfrastructure_list')->name('web.teacher.data_master.facilityandinfrastructure.list');
        Route::get('teacher/data_master/facilityandinfrastructure/create', 'User\TeacherController@facilityandinfrastructure_create')->name('web.teacher.data_master.facilityandinfrastructure.create');
        Route::get('teacher/data_master/facilityandinfrastructure/{facilityAndInfrastructure}/update', 'User\TeacherController@facilityandinfrastructure_update')->name('web.teacher.data_master.facilityandinfrastructure.update');
        /** !SECTION - Master */

        /** SECTION - Academic */
        Route::get('teacher/academic_data', 'User\TeacherController@empty')->name('web.teacher.academic_data');

        Route::get('teacher/academic_data/school_year/list', 'User\TeacherController@school_year_list')->name('web.teacher.academic_data.school_year.list');
        Route::get('teacher/academic_data/school_year/create', 'User\TeacherController@school_year_create')->name('web.teacher.academic_data.school_year.create');
        Route::get('teacher/academic_data/school_year/{school_year}/update', 'User\TeacherController@school_year_update')->name('web.teacher.academic_data.school_year.update');

        Route::get('teacher/academic_data/semester/list', 'User\TeacherController@semester_list')->name('web.teacher.academic_data.semester.list');
        Route::get('teacher/academic_data/semester/create', 'User\academic_data.TeacherController@semester_create')->name('web.teacher.academic_data.semester.create');
        Route::get('teacher/academic_data/semester/{semester}/update', 'User\TeacherController@semester_update')->name('web.teacher.academic_data.semester.update');

        Route::get('teacher/academic_data/subjects/list', 'User\TeacherController@subjects_list')->name('web.teacher.academic_data.subjects.list');
        Route::get('teacher/academic_data/subjects/create', 'User\TeacherController@subjects_create')->name('web.teacher.academic_data.subjects.create');
        Route::get('teacher/academic_data/subjects/{subjects}/update', 'User\TeacherController@subjects_update')->name('web.teacher.academic_data.subjects.update');

        Route::get('teacher/academic_data/scheduleofsubjects/list', 'User\TeacherController@scheduleofsubjects_list')->name('web.teacher.academic_data.scheduleofsubjects.list');
        Route::get('teacher/academic_data/scheduleofsubjects/create', 'User\TeacherController@scheduleofsubjects_create')->name('web.teacher.academic_data.scheduleofsubjects.create');
        Route::get('teacher/academic_data/scheduleofsubjects/{scheduleOfSubjects}/update', 'User\TeacherController@scheduleofsubjects_update')->name('web.teacher.academic_data.scheduleofsubjects.update');

        Route::get('teacher/academic_data/materialandassignment/list', 'User\TeacherController@materialandassignment_list')->name('web.teacher.academic_data.materialandassignment.list');
        Route::get('teacher/academic_data/materialandassignment/create', 'User\TeacherController@materialandassignment_create')->name('web.teacher.academic_data.materialandassignment.create');
        Route::get('teacher/academic_data/materialandassignment/{materialAndAssignment}/update', 'User\TeacherController@materialandassignment_update')->name('web.teacher.academic_data.materialandassignment.update');
        /** !SECTION - Academic */
    });
});
/** !SECTION - Teacher */
Route::middleware(['authc.basic:welcome,administrator,employee'])->group(function () {
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

    Route::post('resource/subjects', 'SubjectsController@create')->name('web.resource.academic_data.subjects.create');
    Route::patch('resource/subjects/{subjects}', 'SubjectsController@update')->name('web.resource.academic_data.subjects.update');
    Route::delete('resource/subjects/{subjects}', 'SubjectsController@delete')->name('web.resource.academic_data.subjects.delete');
    Route::delete('resource/subjects', 'SubjectsController@delete_any')->name('web.resource.academic_data.subjects.delete_any');

    Route::post('resource/scheduleofsubjects', 'ScheduleOfSubjectsController@create')->name('web.resource.academic_data.scheduleofsubjects.create');
    Route::patch('resource/scheduleofsubjects/{scheduleOfSubjects}', 'ScheduleOfSubjectsController@update')->name('web.resource.academic_data.scheduleofsubjects.update');
    Route::delete('resource/scheduleofsubjects/{scheduleOfSubjects}', 'ScheduleOfSubjectsController@delete')->name('web.resource.academic_data.scheduleofsubjects.delete');
    Route::delete('resource/scheduleofsubjects', 'ScheduleOfSubjectsController@delete_any')->name('web.resource.academic_data.scheduleofsubjects.delete_any');

    Route::post('resource/materialandassignment', 'MaterialAndAssignmentController@create')->name('web.resource.academic_data.materialandassignment.create');
    Route::patch('resource/materialandassignment/{materialAndAssignment}', 'MaterialAndAssignmentController@update')->name('web.resource.academic_data.materialandassignment.update');
    Route::delete('resource/materialandassignment/{materialAndAssignment}', 'MaterialAndAssignmentController@delete')->name('web.resource.academic_data.materialandassignment.delete');
    Route::delete('resource/materialandassignment', 'MaterialAndAssignmentController@delete_any')->name('web.resource.academic_data.materialandassignment.delete_any');

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
