<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMajorRequest;
use App\Http\Requests\UpdateMajorRequest;
use App\Models\Major;

class MajorController extends Controller
{
    public function create(CreateMajorRequest $request)
    {
        $this->authorize('create', Major::class);
        $data = $request->validated();
        Major::create($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateMajorRequest $request, Major $major)
    {
        $this->authorize('update', $major);
        $data = $request->validated();
        $major->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function delete(Major $major)
    {
        $this->authorize('delete', $major);
        $major->delete();
        return back();
    }
    public function delete_any()
    {
        $this->authorize('delete_any', Major::class);
        return abort(501);
    }
    public function restore(Major $major)
    {
        $this->authorize('restore', $major);
        return abort(501);
    }
}
