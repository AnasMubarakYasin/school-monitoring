<?php

namespace App\Dynamic\Panel;

use App\Dynamic\Menu;
use App\Models\AcademicActivity;
use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\Employee;
use App\Models\FacilityAndInfrastructure;
use App\Models\Major;
use App\Models\MaterialAndAssignment;
use App\Models\Presence;
use App\Models\ScheduleOfSubjects;
use App\Models\SchoolInformation;
use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subjects;
use Illuminate\Support\Facades\Vite;

class Administrator extends Panel
{
    public bool $webmanifest = true;
    public bool $service_worker = true;
    public function get_webmanifest(): string
    {
        return asset('administrator/site.webmanifest');
    }
    public function get_service_worker(): string
    {
        return Vite::asset('resources/js/components/administrator/regis-sw.js');
    }
    public function get_menus(): array
    {
        return [
            new Menu(
                name: "dashboard",
                link: route('web.administrator.dashboard'),
                icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
              </svg>
              '
            ),
            new Menu(
                name: "master data",
                link: route('web.administrator.data_master'),
                icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
              </svg>
              ',
                submenu: [
                    new Menu(
                        name: "school information",
                        link: route('web.administrator.data_master.school_information.list'),
                        pname: "view_any",
                        pclass: SchoolInformation::class,
                    ),
                    new Menu(
                        name: "facility and infrastrukture",
                        link: route('web.administrator.data_master.facilityandinfrastructure.list'),
                        pname: "view_any",
                        pclass: FacilityAndInfrastructure::class,
                    ),
                    new Menu(
                        name: "major",
                        link: route('web.administrator.data_master.major.list'),
                        pname: "view_any",
                        pclass: Major::class,
                    ),
                    new Menu(
                        name: "classroom",
                        link: route('web.administrator.data_master.classroom.list'),
                        pname: "view_any",
                        pclass: Classroom::class,
                    ),
                ]
            ),
            new Menu(
                name: "academic data",
                link: route('web.administrator.academic_data'),
                icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
              </svg>
              ',
                submenu: [
                    new Menu(
                        name: "school year",
                        link: route('web.administrator.academic_data.school_year.list'),
                        pname: "view_any",
                        pclass: SchoolYear::class,
                    ),
                    new Menu(
                        name: "semester",
                        link: route('web.administrator.academic_data.semester.list'),
                        pname: "view_any",
                        pclass: Semester::class,
                    ),
                    new Menu(
                        name: "subjects",
                        link: route('web.administrator.academic_data.subjects.list'),
                        pname: "view_any",
                        pclass: Subjects::class,
                    ),
                    new Menu(
                        name: "schedule of subjects",
                        link: route('web.administrator.academic_data.scheduleofsubjects.list'),
                        pname: "view_any",
                        pclass: ScheduleOfSubjects::class,
                    ),
                    new Menu(
                        name: "material and assignment",
                        link: route('web.administrator.academic_data.materialandassignment.list'),
                        pname: "view_any",
                        pclass: MaterialAndAssignment::class,
                    ),
                    new Menu(
                        name: "presence",
                        link: route('web.administrator.academic_data.presence.list'),
                        pname: "view_any",
                        pclass: Presence::class,
                    ),
                    new Menu(
                        name: "attendance",
                        link: route('web.administrator.academic_data.attendance.list'),
                        pname: "view_any",
                        pclass: Attendance::class,
                    ),
                    new Menu(
                        name: "academic activity",
                        link: route('web.administrator.academic_data.academic_activity.list'),
                        pname: "view_any",
                        pclass: AcademicActivity::class,
                    ),
                    new Menu(
                        name: "evaluation",
                        link: route('web.administrator.academic_data.evaluation.list'),
                        // pname: "view_any",
                        // pclass: AcademicActivity::class,
                    ),
                ]
            ),
            new Menu(
                name: "users",
                link: route('web.administrator.users'),
                icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
              </svg>
              ',
                submenu: [
                    new Menu(
                        name: "administrator",
                        link: route('web.administrator.users.administrator.list'),
                    ),
                    new Menu(
                        name: "employee",
                        link: route('web.administrator.users.employee.list'),
                        pname: "view_any",
                        pclass: Employee::class,
                    ),
                    new Menu(
                        name: "student",
                        link: route('web.administrator.users.student.list'),
                        pname: "view_any",
                        pclass: Student::class,
                    ),
                ]
            ),
        ];
    }
    public function empty()
    {
        return route('web.administrator.empty');
    }
    public function profile()
    {
        return route('web.administrator.profile');
    }
    public function notifications()
    {
        return route('web.administrator.notification');
    }
    public function signout()
    {
        return route('web.administrator.logout_perfom');
    }
}
