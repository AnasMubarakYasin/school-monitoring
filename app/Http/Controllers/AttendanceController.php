<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function create(CreateAttendanceRequest $request)
    {
        $this->authorize('create', Attendance::class);
        $data = $request->validated();
        Attendance::create($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        $this->authorize('update', $attendance);
        $data = $request->validated();
        $attendance->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function delete(Attendance $attendance)
    {
        $this->authorize('delete', $attendance);
        $attendance->delete();
        return back();
    }
    public function delete_any()
    {
        $request = request();
        $this->authorize('delete_any', Attendance::class);
        if ($request->collect('id')->count() == Attendance::count()) {
            Attendance::truncate();
        } else {
            Attendance::destroy($request->input('id', []));
        }
        return back();
    }
    public function restore(Attendance $attendance)
    {
        $this->authorize('restore', $attendance);
        return abort(501);
    }
}
