<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AcademicActivity;
use App\Models\Answer;
use App\Models\MaterialAndAssignment;
use App\Models\Presence;
use App\Models\ScheduleOfSubjects;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        /** @var Student */
        $user = auth()->user();
        $presences = Presence::with('attendances')->whereHas("attendances", function (Builder $builder) use ($user) {
            $builder->where('student_id', $user->id);
        })->get();

        $academicactivity = AcademicActivity::all()->count();
        $scheduleofsubject = ScheduleOfSubjects::all()->where('class_id', $user->classroom_id)->count();
        $materialandassignment = MaterialAndAssignment::all()->where('classroom_id', $user->classroom_id)->count();

        return view('pages.student.dashboard', [
            'presences' => $presences,
            'academicactivity' => $academicactivity,
            'scheduleofsubject' => $scheduleofsubject,
            'materialandassignment' => $materialandassignment
        ]);
    }
    public function profile()
    {
        return view('pages.student.profile');
    }
    public function notification()
    {
        return view('pages.student.notification');
    }
    public function offline()
    {
        return view('pages.student.offline');
    }
    public function empty()
    {
        return view('pages.student.empty');
    }

    //SECTION - academic_activity
    public function academic_activity_list()
    {
        $resource = AcademicActivity::tableable()->from_request(
            request: request(),
            columns: [
                'name',
                'duration',
                'executive',
                'type',
                'start_at',
                'end_at',
                'description',
            ],
            pagination: ['per' => 7, 'num' => 1],
        );
        $resource->init['perpage'] = 7;
        return view('pages.student.academic_activity.list', ['resource' => $resource]);
    }
    public function academic_activity_create()
    {
        $resource = AcademicActivity::formable()->from_create(
            fields: [
                'name',
                'duration',
                'executive',
                'type',
                'start_at',
                'end_at',
                'description',
            ],
        );
        $resource->route_view_any = function () {
            return route('web.student.academic_activity.list');
        };
        return view('pages.student.academic_activity.create', ['resource' => $resource]);
    }
    public function academic_activity_update(AcademicActivity $academic_activity)
    {
        $resource = AcademicActivity::formable()->from_update(
            model: $academic_activity,
            fields: [
                'name',
                'duration',
                'executive',
                'type',
                'start_at',
                'end_at',
                'description',
            ],
        );
        $resource->route_view_any = function () {
            return route('web.student.academic_activity.list');
        };
        return view('pages.student.academic_activity.update', ['resource' => $resource]);
    }
    //!SECTION - academic_activity

    //SECTION - subject of schedule
    public function scheduleofsubjects_list()
    {
        $resource = ScheduleOfSubjects::tableable()->from_request(
            request: request(),
            columns: [
                'subjects',
                'classroom',
                'teacher',
                'time',
                'day',
                'description',
                'file'
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->filter = ['classrooms' => Auth::user()->classroom_id];
        $resource->init['reference'] = '';
        return view('pages.student.scheduleofsubjects.list', ['resource' => $resource]);
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
                'file'
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->init['reference'] = '';
        $resource->filter = ['classroom' => Auth::user()->classroom_id];
        return view('pages.student.materialandassignment.list', ['resource' => $resource]);
    }
    public function answer_view(MaterialAndAssignment $materialAndAssignment)
    {
        $resource = Answer::formable()->from_create(
            fields: [
                'file',
                'material_and_assignment',
            ],
            hidden: [
                'material_and_assignment'
            ]
        );
        $resource->model['material_and_assignment_id'] = $materialAndAssignment->id;
        $resource->route_create = function () {
            return route('web.resource.answer.create');
        };
        $resource->route_view_any = function () {
            return route('web.student.materialandassignment.list');
        };
        $resource->fetcher_relation = function ($definition) {
            return MaterialAndAssignment::all();
        };
        return view('pages.student.materialandassignment.answare.view', ['resource' => $resource]);
    }
    // public function respon_answer()
    // {
    //     return view('pages.student.materialandassignment.answare.detail');
    // }
    //!SECTION - material and assignment

    // //SECTION - presence
    // public function presence_list()
    // {
    //     $resource = Presence::tableable()->from_request(
    //         request: request(),
    //         columns: [
    //         ],
    //         pagination: ['per' => 5, 'num' => 1],
    //     );
    //     return view('pages.student.presence.list', ['resource' => $resource]);
    // }
    // //!SECTION - presence
}
