<?php

namespace App\Http\Controllers\User\Employee;

use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function dashboard()
    {
        return view('pages.employee.staff.dashboard');
    }
    public function profile()
    {
        return view('pages.employee.staff.profile');
    }
    public function notification()
    {
        return view('pages.employee.staff.notification');
    }
    public function offline()
    {
        return view('pages.employee.staff.offline');
    }
    public function empty()
    {
        return view('pages.employee.staff.empty');
    }
}
