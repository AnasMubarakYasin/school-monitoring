<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectsRequest;
use App\Http\Requests\UpdateSubjectsRequest;
use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function create(StoreSubjectsRequest $request)
    {
        $this->authorize('create', Subjects::class);
        $data = $request->validated();
        Subjects::create($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateSubjectsRequest $request, Subjects $subjects)
    {
        $this->authorize('update', $subjects);
        $data = $request->validated();
        $subjects->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function delete(Subjects $subjects)
    {
        $this->authorize('delete', $subjects);
        $subjects->delete();
        return back();
    }
    public function delete_any(Request $request)
    {
        $this->authorize('delete_any', Subjects::class);
        if ($false/* mark */) {
            Subjects::truncate();
        } else {
            Subjects::destroy($request->input('id', []));
        }
        return back();
    }
    public function restore(Subjects $subjects)
    {
        $this->authorize('restore', $subjects);
        return abort(501);
    }
}
