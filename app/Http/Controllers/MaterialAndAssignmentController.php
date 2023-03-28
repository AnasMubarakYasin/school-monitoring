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
        $data = $request->validated();
        if ($request->file('file')) {
            $data['file'] = Storage::put("material_and_assigment", $request->file('file'));
        }
        MaterialAndAssignment::create($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateMaterialAndAssignmentRequest $request, MaterialAndAssignment $materialAndAssignment)
    {
        $this->authorize('update', $materialAndAssignment);
        $data = $request->validated();
        if ($request->file('file')) {
            $data['file'] = Storage::put("material_and_assigment", $request->file('file'));

            Storage::delete("material_and_assigment", $materialAndAssignment->file);
        } else {
            $data['file'] = $materialAndAssignment->file;
        }
        $materialAndAssignment->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function delete(MaterialAndAssignment $materialAndAssignment)
    {
        $this->authorize('delete', $materialAndAssignment);
        Storage::delete("material_and_assigment", $materialAndAssignment->file);
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
