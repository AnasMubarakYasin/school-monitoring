<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class AdministratorController extends Controller
{
    public function dashboard()
    {
        return view('pages.administrator.dashboard');
    }
    public function profile()
    {
        return view('pages.administrator.profile');
    }
    public function notification()
    {
        return view('pages.administrator.notification');
    }
    public function empty_show()
    {
        return view('pages.administrator.empty');
    }
}
