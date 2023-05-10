<?php

namespace App\Dynamic\Panel;

use App\Dynamic\Menu;
use App\Models\AcademicActivity;
use App\Models\ScheduleOfSubjects;
use Illuminate\Support\Facades\Vite;

class StudentParent extends Panel
{
    public bool $webmanifest = false;
    public bool $service_worker = false;
    public function get_menus(): array
    {
        return [
            new Menu(
                name: "dashboard",
                link: route('web.student_parent.dashboard'),
                icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
              </svg>'
            ),
        ];
    }
    public function empty()
    {
        return route('web.student_parent.empty');
    }
    public function profile()
    {
        return route('web.student_parent.profile');
    }
    public function notifications()
    {
        return route('web.student_parent.notification');
    }
    public function signout()
    {
        return route('web.student_parent.logout_perfom');
    }
}
