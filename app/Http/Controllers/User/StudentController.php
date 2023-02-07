<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Presence;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;

class StudentController extends Controller
{
    public function dashboard()
    {
        /** @var Student */
        $user = auth()->user();
        $presences = Presence::with('classroom')->whereHas("classroom", function (Builder $builder) use ($user) {
            $builder->where('id', $user->classroom_id);
        })->get();

        return view('pages.employee.dashboard', [
            'presences' => $presences,
        ]);
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
