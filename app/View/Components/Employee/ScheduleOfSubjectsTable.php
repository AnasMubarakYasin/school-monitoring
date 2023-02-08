<?php

namespace App\View\Components\Employee;

use App\Models\ScheduleOfSubjects;
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
        $teacherId = Auth::user()->id;
        $resource = ScheduleOfSubjects::with('subjects', 'classrooms')->where('teacher_id', $teacherId)->get();
        return view('components.employee.schedule-of-subjects-table', ['resource' => $resource]);
    }
}
