<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;

class StudentController extends Controller
{
    public function create(CreateStudentRequest $request)
    {
        $this->authorize('create', Student::class);
        $data = $request->validated();
        Student::create($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $this->authorize('update', $student);
        $data = $request->validated();
        $student->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function delete(Student $student)
    {
        $this->authorize('delete', $student);
        $student->delete();
        return back();
    }
    public function delete_any()
    {
        $this->authorize('delete_any', Student::class);
        return abort(501);
    }
    public function restore(Student $student)
    {
        $this->authorize('restore', $student);
        return abort(501);
    }
}
