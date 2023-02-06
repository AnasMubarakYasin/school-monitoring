<?php

namespace App\Dynamic\Panel;

use App\Dynamic\Menu;
use App\Models\Classroom;
use App\Models\Employee;
use App\Models\FacilityAndInfrastructure;
use App\Models\Major;
use App\Models\MaterialAndAssignment;
use App\Models\ScheduleOfSubjects;
use App\Models\SchoolInformation;
use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subjects;

class Administrator extends Panel
{
    public function get_menus(): array
    {
        return [
            new Menu(
                name: "dashboard",
                link: route('web.administrator.dashboard'),
                icon: '<svg  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>'
            ),
            new Menu(
                name: "master data",
                link: route('web.administrator.data_master'),
                icon: '<svg  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>',
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
                icon: '<svg  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>',
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
                ]
            ),
            new Menu(
                name: "users",
                link: route('web.administrator.users'),
                icon: '<svg  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>',
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
}
