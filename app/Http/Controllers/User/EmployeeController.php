<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Employee;
use App\Models\MaterialAndAssignment;
use App\Models\ScheduleOfSubjects;
use App\Models\Subjects;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        return view('pages.employee.dashboard');
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

    //SECTION - subject of schedule
    public function scheduleofsubjects_list()
    {
        $resource = ScheduleOfSubjects::tableable()->from_request(
            request: request(),
            columns: [
                'subjects',
                'classrooms',
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
        return view('pages.employee.academic_data.scheduleofsubjects.list', ['resource' => $resource]);
    }
    //!SECTION - subject of schedule

    //SECTION - material and assignment
    public function materialandassignment_list()
    {
        $resource = MaterialAndAssignment::tableable()->from_request(
            request: request(),
            columns: [
                'subjects',
                'classrooms',
                'type',
                'start_at',
                'end_at',
                'description'
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.employee.academic_data.materialandassignment.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.employee.academic_data.materialandassignment.update', ['materialAndAssignment' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.academic_data.materialandassignment.delete', ['materialAndAssignment' => $item]);
        };
        $resource->init['filter_by_column'] = false;
        $resource->init['reference'] = '';
        $resource->filter = ['teacher' =>  Auth::user()->id];
        return view('pages.employee.academic_data.materialandassigment.list', ['resource' => $resource]);
    }
    public function materialandassignment_create()
    {
        $resource = MaterialAndAssignment::formable()->from_create(
            fields: [
                'subjects',
                'classrooms',
                'teacher',
                'type',
                'start_at',
                'end_at',
                'description'
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
            return route('web.employee.academic_data.materialandassignment.list');
        };
        $resource->fetcher_relation = function ($definition) {
            if ($definition->name == 'subjects') {
                return Subjects::all();
            } else if ($definition->name == 'classrooms') {
                return Classroom::all();
            } else {
                return collect([Auth::user()]);
            }
        };

        return view('pages.employee.academic_data.materialandassigment.create', ['resource' => $resource]);
    }
    public function materialandassignment_update(MaterialAndAssignment $materialAndAssignment)
    {
        $resource = MaterialAndAssignment::formable()->from_update(
            model: $materialAndAssignment,
            fields: [
                'subjects',
                'classrooms',
                'teacher',
                'type',
                'start_at',
                'end_at',
                'description'
            ],
            hidden: [
                'teacher'
            ]
        );
        $resource->route_update = function ($item) {
            return route('web.resource.academic_data.materialandassignment.update', ['materialAndAssignment' => $item]);
        };
        $resource->route_view_any = function ($item) {
            return route('web.employee.academic_data.materialandassignment.list');
        };
        $resource->fetcher_relation = function ($definition) {
            if ($definition->name == 'subjects') {
                return Subjects::all();
            } else if ($definition->name == 'classrooms') {
                return Classroom::all();
            } else {
                return Employee::all();
            }
        };
        return view('pages.employee.academic_data.materialandassigment.update', ['resource' => $resource]);
    }
    //!SECTION - material and assignment
}
