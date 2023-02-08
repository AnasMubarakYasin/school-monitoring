<?php

namespace App\Dynamic\Panel;

use App\Dynamic\Menu;
use App\Models\MaterialAndAssignment;
use App\Models\ScheduleOfSubjects;

class Employee extends Panel
{
    public function get_menus(): array
    {
        return [
            new Menu(
                name: "dashboard",
                link: route('web.employee.dashboard'),
                icon: '<svg  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>'
            ),
            new Menu(
                name: "academic data",
                link: route('web.employee.academic_data'),
                icon: '<svg  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>',
                submenu: [
                    new Menu(
                        name: "schedule of subjects",
                        link: route('web.employee.academic_data.scheduleofsubjects.list'),
                        pname: "view_any",
                        pclass: ScheduleOfSubjects::class,
                    ),
                    new Menu(
                        name: "material and assignment",
                        link: route('web.employee.academic_data.materialandassignment.list'),
                        pname: "view_any",
                        pclass: MaterialAndAssignment::class,
                    ),
                ]
            ),
        ];
    }
    public function empty()
    {
        return route('web.employee.empty');
    }
    public function profile()
    {
        return route('web.employee.profile');
    }
    public function notifications()
    {
        return route('web.employee.notification');
    }
    public function signout()
    {
        return route('web.employee.logout_perfom');
    }
}
