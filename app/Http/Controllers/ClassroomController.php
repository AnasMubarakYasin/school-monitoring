<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function create(CreateClassroomRequest $request)
    {
        $this->authorize('create', Classroom::class);
        $data = $request->validated();
        Classroom::create($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        $this->authorize('update', $classroom);
        $data = $request->validated();
        $classroom->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function delete(Classroom $classroom)
    {
        $this->authorize('delete', $classroom);
        $classroom->delete();
        return back();
    }
    public function delete_any()
    {
        $this->authorize('delete_any', Classroom::class);
        return abort(501);
    }
    public function restore(Classroom $classroom)
    {
        $this->authorize('restore', $classroom);
        return abort(501);
    }
}
