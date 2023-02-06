<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        return view('pages.employee.dashboard');
    }
    public function profile()
    {
        return view('pages.employee.profile');
    }
    public function notification()
    {
        return view('pages.employee.notification');
    }
    public function offline()
    {
        return view('pages.employee.offline');
    }
    public function empty()
    {
        return view('pages.employee.empty');
    }
}
