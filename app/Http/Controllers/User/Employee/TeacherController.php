<?php

namespace App\Http\Controllers\User\Employee;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Classroom;
use App\Models\Employee;
use App\Models\MaterialAndAssignment;
use App\Models\Presence;
use App\Models\ScheduleOfSubjects;
use App\Models\Student;
use App\Models\Subjects;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function dashboard()
    {
        /** @var Employee */
        $user = auth()->user();
        $presences = Presence::with('teacher')->whereHas("teacher", function (Builder $builder) use ($user) {
            $builder->where('id', $user->id);
        })->get();
        $scheduleofsubject = ScheduleOfSubjects::all()->where('teacher_id', $user->id)->count();
        $materialandassignment = MaterialAndAssignment::all()->where('teacher_id', $user->id)->count();
        return view('pages.employee.teacher.dashboard', [
            'presences' => $presences,
            'scheduleofsubject' => $scheduleofsubject,
            'materialandassignment' => $materialandassignment
        ]);
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
        return view('pages.employee.teacher.profile', ['resource' => $resource]);
    }
    public function notification()
    {
        return view('pages.employee.teacher.notification');
    }
    public function offline()
    {
        return view('pages.employee.teacher.offline');
    }
    public function empty()
    {
        return view('pages.employee.teacher.empty');
    }

    //SECTION - subject of schedule
    public function scheduleofsubjects_list()
    {
        $resource = ScheduleOfSubjects::tableable()->from_request(
            request: request(),
            columns: [
                'subjects',
                'classroom',
                // 'teacher',
                'time',
                'day',
                'description'
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->filter = ['teacher' =>  Auth::user()->id];
        $resource->init['filter_by_column'] = false;
        $resource->init['reference'] = '';
        return view('pages.employee.teacher.academic_data.scheduleofsubjects.list', ['resource' => $resource]);
    }
    //!SECTION - subject of schedule

    //SECTION - material and assignment
    public function materialandassignment_list()
    {
        $resource = MaterialAndAssignment::tableable()->from_request(
            request: request(),
            columns: [
                'subjects',
                'classroom',
                'type',
                'start_at',
                'end_at',
                'description',
                'file',
                'answer'
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.employee.teacher.academic_data.materialandassignment.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.employee.teacher.academic_data.materialandassignment.update', ['materialAndAssignment' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.academic_data.materialandassignment.delete', ['materialAndAssignment' => $item]);
        };
        $resource->init['filter_by_column'] = false;
        $resource->init['reference'] = '';
        $resource->filter = ['teacher' =>  Auth::user()->id];
        $resource->route_relation = function ($definition, $item) {
            return match ($definition->name) {
                'answer' => route('web.employee.teacher.answer'),
                default => ""
            };
        };
        return view('pages.employee.teacher.academic_data.materialandassigment.list', ['resource' => $resource]);
    }
    public function materialandassignment_create()
    {
        $resource = MaterialAndAssignment::formable()->from_create(
            fields: [
                'subjects',
                'classroom',
                'teacher',
                'type',
                'start_at',
                'end_at',
                'description',
                'file'
            ],
            hidden: [
                'teacher'
            ]
        );
        $resource->model['teacher_id'] = Auth::user()->id;
        $resource->route_create = function () {
            return route('web.resource.academic_data.materialandassignment.create');
        };
        $resource->route_view_any = function () {
            return route('web.employee.teacher.academic_data.materialandassignment.list');
        };
        $resource->fetcher_relation = function ($definition) {
            if ($definition->name == 'subjects') {
                return Subjects::all();
            } else if ($definition->name == 'classroom') {
                return Classroom::all();
            } else {
                return collect([Auth::user()]);
            }
        };

        return view('pages.employee.teacher.academic_data.materialandassigment.create', ['resource' => $resource]);
    }
    public function materialandassignment_update(MaterialAndAssignment $materialAndAssignment)
    {
        $resource = MaterialAndAssignment::formable()->from_update(
            model: $materialAndAssignment,
            fields: [
                'subjects',
                'classroom',
                'teacher',
                'type',
                'start_at',
                'end_at',
                'description',
                'file'
            ],
            hidden: [
                'teacher'
            ]
        );
        $resource->route_update = function ($item) {
            return route('web.resource.academic_data.materialandassignment.update', ['materialAndAssignment' => $item]);
        };
        $resource->route_view_any = function ($item) {
            return route('web.employee.teacher.academic_data.materialandassignment.list');
        };
        $resource->fetcher_relation = function ($definition) {
            if ($definition->name == 'subjects') {
                return Subjects::all();
            } else if ($definition->name == 'classroom') {
                return Classroom::all();
            } else {
                return Employee::all();
            }
        };
        return view('pages.employee.teacher.academic_data.materialandassigment.update', ['resource' => $resource]);
    }
    public function answer()
    {
        $resource = Answer::tableable()->from_request(
            request: request(),
            columns: [
                'file',
                'student',
                'status',
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_edit = function ($item) {
            return route('web.employee.teacher.answer.update', ['answer' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.answer.delete', ['answer' => $item]);
        };
        $resource->init['filter_by_column'] = false;
        $resource->init['reference'] = '';
        return view('pages.employee.teacher.answer.view', ['resource' => $resource]);
    }
    public function answer_update(Answer $answer)
    {
        $resource = Answer::formable()->from_update(
            model: $answer,
            fields: [
                'student',
                'status',
                'description'
            ],
        );
        $resource->route_update = function ($item) {
            return route('web.resource.answer.update', ['answer' => $item]);
        };
        $resource->route_view_any = function ($item) {
            return route('web.employee.teacher.answer');
        };
        $resource->fetcher_relation = function ($definition) {
            return Student::all();
        };
        return view('pages.employee.teacher.answer.update', ['resource' => $resource]);
    }
    //!SECTION - material and assignment
    //SECTION - presence
    public function presence_list()
    {
        $resource = Presence::tableable()->from_request(
            request: request(),
            columns: [
                'name',

                'school_year',
                'semester',
                'subjects',
                'classroom',
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->init['filter_by_column'] = false;
        $resource->init['reference'] = '';
        $resource->filter = ['teacher' =>  Auth::user()->id];
        return view('pages.employee.teacher.presence.list', ['resource' => $resource]);
    }
    public function presence_view(Presence $presence)
    {
        return view('pages.employee.teacher.presence.view', ['presence' => $presence]);
    }
    //!SECTION - presence
}
