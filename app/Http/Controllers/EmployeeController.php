<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create(CreateEmployeeRequest $request)
    {
        $this->authorize('create', Employee::class);
        $data = $request->validated();
        Employee::create($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $this->authorize('update', $employee);
        $data = $request->validated();
        $employee->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function delete(Employee $employee)
    {
        $this->authorize('delete', $employee);
        $employee->delete();
        return back();
    }
    public function delete_any(Request $request)
    {
        $this->authorize('delete_any', Employee::class);
        if ($request->input('all')) {
            Employee::truncate();
        } else {
            Employee::destroy($request->input('id', []));
        }
        return back();
    }
    public function restore(Employee $employee)
    {
        $this->authorize('restore', $employee);
        return abort(501);
    }
}
