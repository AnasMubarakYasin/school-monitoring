<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function create(CreateEmployeeRequest $request)
    {
        $this->authorize('create', Employee::class);
        $data = $request->validated();
        Employee::create($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateEmployeeRequest $request, Employee $semester)
    {
        $this->authorize('update', $semester);
        $data = $request->validated();
        $semester->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function delete(Employee $semester)
    {
        $this->authorize('delete', $semester);
        $semester->delete();
        return back();
    }
    public function delete_any()
    {
        $this->authorize('delete_any', Employee::class);
        return abort(501);
    }
    public function restore(Employee $semester)
    {
        $this->authorize('restore', $semester);
        return abort(501);
    }
}
