<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMaterialAndAssignmentRequest;
use App\Http\Requests\UpdateMaterialAndAssignmentRequest;
use App\Models\MaterialAndAssignment;
use Illuminate\Support\Facades\Storage;

class MaterialAndAssignmentController extends Controller
{
    public function create(StoreMaterialAndAssignmentRequest $request)
    {
        $this->authorize('create', MaterialAndAssignment::class);
        $newName = '';
        if ($request->file('file')) {
            $extension = $request->file('file')->getClientOriginalExtension();
            $newName = $request->nama . '-' . now()->timestamp . '.' . $extension;
            $request->file('file')->storeAs('public/materialandassignment', $newName);
        }
        $data = $request->validated();
        $data['file'] = $newName;
        MaterialAndAssignment::create($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateMaterialAndAssignmentRequest $request, MaterialAndAssignment $materialAndAssignment)
    {
        $this->authorize('update', $materialAndAssignment);
        if ($request->file('file')) {
            $extension = $request->file('file')->getClientOriginalExtension();
            $newName = $request->nama . '-' . now()->timestamp . '.' . $extension;
            $request->file('file')->storeAs('public/materialandassignment', $newName);

            Storage::delete('public/materialandassignment/' . $materialAndAssignment->file);
        } else {
            $newName = $materialAndAssignment->file;
        }
        $data = $request->validated();
        $data['file'] = $newName;
        $materialAndAssignment->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function delete(MaterialAndAssignment $materialAndAssignment)
    {
        $this->authorize('delete', $materialAndAssignment);
        Storage::delete('public/materialandassignment/' . $materialAndAssignment->file);
        $materialAndAssignment->delete();
        return back();
    }
    public function delete_any()
    {
        $this->authorize('delete_any', MaterialAndAssignment::class);
        return abort(501);
    }
    public function restore(MaterialAndAssignment $materialAndAssignment)
    {
        $this->authorize('restore', $materialAndAssignment);
        return abort(501);
    }
}
