<?php

namespace App\Http\Controllers\User\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;

class StaffController extends Controller
{
    public function dashboard()
    {
        return view('pages.employee.staff.dashboard');
    }
    public function profile()
    {
        $resource = Employee::formable()->from_update(
            model: auth()->user(),
            fields: [
                'photo', 'name', 'telp', 'email',
                'nip',
                'fullname',
                'gender',
                'state',
                'task',
            ],
        );
        return view('pages.employee.staff.profile', ['resource' => $resource]);
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

    public function letter()
    {
        return view('pages.employee.staff.letter_printing.letter');
    }
}
