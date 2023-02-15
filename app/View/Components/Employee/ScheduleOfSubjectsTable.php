<?php

namespace App\View\Components\Employee;

use App\Models\Employee;
use App\Models\ScheduleOfSubjects;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class ScheduleOfSubjectsTable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = Auth::user();
        $authUser = $user::class;
        if ($user::class == Student::class) {
            $resource = ScheduleOfSubjects::with('subjects')->where('class_id', $user->classroom_id)->get();
        } else if ($user::class == Employee::class) {
            $resource = ScheduleOfSubjects::with('subjects', 'classrooms')->where('teacher_id', $user->id)->get();
        }
        return view('components.employee.schedule-of-subjects-table', ['resource' => $resource, 'authUser' => $authUser]);
    }
}
