<?php

namespace App\Dynamic\Panel;

use App\Dynamic\Menu;
use App\Models\AcademicActivity;

class Student extends Panel
{
    public function get_menus(): array
    {
        return [
            new Menu(
                name: "dashboard",
                link: route('web.student.dashboard'),
                icon: '<svg  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>'
            ),
            new Menu(
                name: "academic activity",
                link: route('web.student.academic_activity.list'),
                icon: '<svg  fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>',
                pname: "view_any",
                pclass: AcademicActivity::class,
            ),
        ];
    }
    public function empty()
    {
        return route('web.student.empty');
    }
    public function profile()
    {
        return route('web.student.profile');
    }
    public function notifications()
    {
        return route('web.student.notification');
    }
    public function signout()
    {
        return route('web.student.logout_perfom');
    }
}
