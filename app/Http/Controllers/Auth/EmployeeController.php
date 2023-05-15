<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordAdministratorRequest;
use App\Http\Requests\SignInAdministratorRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class EmployeeController extends Controller
{
    public function entry()
    {
        /** @var Employee */
        $user = auth()->user();
        return $this->re_route($user);
    }

    private function re_route(Employee $user) {
        // dd($user);
        if ($user->task == "teacher") {
            return to_route('web.employee.teacher.dashboard');
        } else if ($user->task == "staff") {
            return to_route('web.employee.staff.dashboard');
        } else {
            abort(404);
        }
    }

    public function change_password(ChangePasswordAdministratorRequest $request)
    {
        $data = $request->validated();
        /** @var User */
        $user = auth()->user();
        if (!auth()->validate(['name' => $user->name, 'password' => $data['password_current']])) {
            return back()->withErrors(["password_current" => ['password mismatch']]);
        }
        if ($data['password_current'] == $data['password']) {
            return back()->withErrors(["password" => ['new password cannot same with current password']]);
        }
        $user->password = $data['password'];
        $user->save();
        return back();
    }
    public function login_show()
    {
        return view('pages.employee.login');
    }

    public function login_perfom(SignInAdministratorRequest $request)
    {
        $data = $request->validated();
        if (auth()->attempt(Arr::only($data, ['name', 'password']), isset($data['remember']))) {
            session()->regenerate();

            $user = auth()->user();
            return $this->re_route($user);
        } else {
            return back()->withErrors(['name' => ['username mismatch'], 'password' => ['password mismatch']]);
        }
    }

    public function logout_perfom()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        return to_route('web.employee.login_show');
    }
}
