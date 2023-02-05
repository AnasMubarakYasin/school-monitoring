<?php

namespace App\Dynamic\Panel;

use App\Dynamic\Menu;

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
                    ),
                    new Menu(
                        name: "facility and infrastructure",
                        link: route('web.administrator.data_master.facilityandinfrastructure.list'),
                    ),
                    new Menu(
                        name: "major",
                        link: route('web.administrator.data_master.major.list'),
                    ),
                    new Menu(
                        name: "classroom",
                        link: route('web.administrator.data_master.classroom.list'),
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
                    ),
                    new Menu(
                        name: "semester",
                        link: route('web.administrator.academic_data.semester.list'),
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
                    ),
                    new Menu(
                        name: "student",
                        link: route('web.administrator.users.student.list'),
                    ),
                ]
            ),
        ];
    }
}
