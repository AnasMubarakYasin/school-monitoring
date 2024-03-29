<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAcademicActivityRequest;
use App\Http\Requests\UpdateAcademicActivityRequest;
use App\Models\AcademicActivity;
use App\Models\Student;
use App\Models\User;
use App\Notifications\AcademicActivityReleased;
use Illuminate\Http\Request;

class AcademicActivityController extends Controller
{
    public function create(CreateAcademicActivityRequest $request)
    {
        $this->authorize('create', AcademicActivity::class);
        $data = $request->validated();
        $model = AcademicActivity::create($data);
        $students = Student::all();
        foreach ($students as $student) {
            $student->notifyNow(new AcademicActivityReleased($model));
        }
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateAcademicActivityRequest $request, AcademicActivity $academic_activity)
    {
        $this->authorize('update', $academic_activity);
        $data = $request->validated();
        $academic_activity->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function delete(AcademicActivity $academic_activity)
    {
        $this->authorize('delete', $academic_activity);
        $academic_activity->delete();
        return back();
    }
    public function delete_any(Request $request)
    {
        $this->authorize('delete_any', AcademicActivity::class);
        if (false/* mark */) {
            AcademicActivity::truncate();
        } else {
            AcademicActivity::destroy($request->input('id', []));
        }
        return back();
    }
    public function restore(AcademicActivity $academic_activity)
    {
        $this->authorize('restore', $academic_activity);
        return abort(501);
    }
}
