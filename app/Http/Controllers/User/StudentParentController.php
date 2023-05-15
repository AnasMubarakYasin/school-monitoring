<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AcademicActivity;
use App\Models\Answer;
use App\Models\MaterialAndAssignment;
use App\Models\Presence;
use App\Models\ScheduleOfSubjects;
use App\Models\Student;
use App\Models\StudentParent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class StudentParentController extends Controller
{
    public function dashboard()
    {
        /** @var StudentParent */
        $user = auth()->user();
        $student = $user->student()->first();
        $presences = Presence::with('attendances')->whereHas("attendances", function (Builder $builder) use ($student) {
            $builder->where('student_id', $student->id);
        })->get();
        $material_assignments = MaterialAndAssignment::with('answer')->whereHas("answer", function (Builder $builder) use ($student) {
            $builder->where('student_id', $student->id);
        })->get();

        // $academicactivity = AcademicActivity::all()->count();
        // $scheduleofsubject = ScheduleOfSubjects::all()->where('class_id', $user->classroom_id)->count();
        // $materialandassignment = MaterialAndAssignment::all()->where('classroom_id', $user->classroom_id)->count();

        return view('pages.student_parent.dashboard', [
            'presences' => $presences,
            'material_assignments' => $material_assignments,
            // 'academicactivity' => $academicactivity,
            // 'scheduleofsubject' => $scheduleofsubject,
            // 'materialandassignment' => $materialandassignment
        ]);
    }
    public function profile()
    {
        return view('pages.student_parent.profile');
    }
    public function notification()
    {
        return view('pages.student_parent.notification');
    }
    public function offline()
    {
        return view('pages.student_parent.offline');
    }
    public function empty()
    {
        return view('pages.student_parent.empty');
    }
}
