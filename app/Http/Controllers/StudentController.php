<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

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
    public function delete_any(Request $request)
    {
        $this->authorize('delete_any', Student::class);
        if ($request->input('all')) {
            Student::truncate();
        } else {
            Student::destroy($request->input('id', []));
        }
        return back();
    }
    public function restore(Student $student)
    {
        $this->authorize('restore', $student);
        return abort(501);
    }
}
