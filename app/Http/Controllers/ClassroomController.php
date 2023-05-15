<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\Classroom;
use App\Models\Student;

class ClassroomController extends Controller
{
    public function create(CreateClassroomRequest $request)
    {
        $this->authorize('create', Classroom::class);
        $data = $request->validated();
        /** @var Classroom */
        $classroom = Classroom::create($data);
        isset($data['students_id']) && Student::whereIn('id', array_values($data['students_id']))->update(['classroom_id' => $classroom->id]);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        $this->authorize('update', $classroom);
        $data = $request->validated();
        $classroom->update($data);
        $students = $classroom->students()->get()->map(fn ($student) => $student->id)->toArray();
        $new_students = $data['students_id'] ?? [];
        Student::whereIn('id', array_values(array_diff($students, $new_students)))->update(['classroom_id' => null]);
        Student::whereIn('id', array_values(array_diff($new_students, $students)))->update(['classroom_id' => $classroom->id]);
        // dd($data, $students, $new_students, array_diff($students, $new_students), array_diff($new_students, $students));
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
        $request = request();
        $this->authorize('delete_any', Classroom::class);
        if ($request->collect('id')->count() == Classroom::count()) {
            Classroom::truncate();
        } else {
            Classroom::destroy($request->input('id', []));
        }
        return back();
    }
    public function restore(Classroom $classroom)
    {
        $this->authorize('restore', $classroom);
        return abort(501);
    }
}
