<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Imports\StudentsImport;
use App\Models\Student;
use App\Models\StudentParent;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function create(CreateStudentRequest $request)
    {
        $this->authorize('create', Student::class);
        $data = $request->validated();
        $student = Student::create($data);
        $data['student_id'] = $student->id;
        StudentParent::create($data);
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
        if ($false/* mark */) {
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
    public function import(Request $request)
    {
        $this->authorize('import', Student::class);
        Excel::import(new StudentsImport, $request->file('import'));
        return back();
    }
}
