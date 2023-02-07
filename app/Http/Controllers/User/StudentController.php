<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AcademicActivity;
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

        return view('pages.student.dashboard', [
            'presences' => $presences,
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
}
