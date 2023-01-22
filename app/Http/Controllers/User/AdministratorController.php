<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Administrator;

class AdministratorController extends Controller
{
    public function dashboard()
    {
        return view('pages.administrator.dashboard', [
            'administrator' => Administrator::count()
        ]);
    }
    public function profile()
    {
        return view('pages.administrator.profile');
    }
    public function notification()
    {
        return view('pages.administrator.notification');
    }
    public function empty()
    {
        return view('pages.administrator.empty');
    }

    public function administrator()
    {
        return view('pages.administrator.users.administrator.index');
    }
}
