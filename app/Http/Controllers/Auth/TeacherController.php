<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInAdministratorRequest;
use Illuminate\Support\Arr;

class TeacherController extends Controller
{
    public function login_show()
    {
        return view('pages.teacher.login');
    }

    public function login_perfom(SignInAdministratorRequest $request)
    {
        $data = $request->validated();
        if (auth()->attempt(Arr::only($data, ['name', 'password']), isset($data['remember']))) {
            session()->regenerate();

            return to_route('web.teacher.dashboard');
        } else {
            return back()->withErrors(['name' => ['username mismatch'], 'password' => ['password mismatch']]);
        }
    }

    public function logout_perfom()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        return to_route('web.teacher.login_show');
    }
}
