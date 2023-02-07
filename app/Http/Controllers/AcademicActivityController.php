<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAcademicActivityRequest;
use App\Http\Requests\UpdateAcademicActivityRequest;
use App\Models\AcademicActivity;

class AcademicActivityController extends Controller
{
    public function create(CreateAcademicActivityRequest $request)
    {
        $this->authorize('create', AcademicActivity::class);
        $data = $request->validated();
        AcademicActivity::create($data);
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
    public function delete_any()
    {
        $this->authorize('delete_any', AcademicActivity::class);
        return abort(501);
    }
    public function restore(AcademicActivity $academic_activity)
    {
        $this->authorize('restore', $academic_activity);
        return abort(501);
    }
}
