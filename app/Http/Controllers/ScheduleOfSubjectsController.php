<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleOfSubjectsRequest;
use App\Http\Requests\UpdateScheduleOfSubjectsRequest;
use App\Models\ScheduleOfSubjects;
use Illuminate\Http\Request;

class ScheduleOfSubjectsController extends Controller
{
    public function create(StoreScheduleOfSubjectsRequest $request)
    {
        $this->authorize('create', ScheduleOfSubjects::class);
        $data = $request->validated();
        $schedule = new ScheduleOfSubjects();
        $schedule->fill($data);
        $schedule->save();
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateScheduleOfSubjectsRequest $request, ScheduleOfSubjects $scheduleOfSubjects)
    {
        $this->authorize('update', $scheduleOfSubjects);
        $data = $request->validated();
        $scheduleOfSubjects->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function delete(ScheduleOfSubjects $scheduleOfSubjects)
    {
        $this->authorize('delete', $scheduleOfSubjects);
        $scheduleOfSubjects->delete();
        return back();
    }
    public function delete_any(Request $request)
    {
        $this->authorize('delete_any', ScheduleOfSubjects::class);
        if ($false/* mark */) {
            ScheduleOfSubjects::truncate();
        } else {
            ScheduleOfSubjects::destroy($request->input('id', []));
        }
        return back();
    }
    public function restore(ScheduleOfSubjects $scheduleOfSubjects)
    {
        $this->authorize('restore', $scheduleOfSubjects);
        return abort(501);
    }
}
