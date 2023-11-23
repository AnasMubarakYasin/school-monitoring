<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SemesterController extends Controller
{
    public function create(CreateSemesterRequest $request)
    {
        $this->authorize('create', Semester::class);
        $data = $request->validated();
        if ($data['part'] == 'odd') {
            $data['name'] = Carbon::parse($data['start_at'])->year . "/" . $data['part'];
        } else {
            $data['name'] = Carbon::parse($data['end_at'])->year . "/" . $data['part'];
        }
        Semester::create($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateSemesterRequest $request, Semester $semester)
    {
        $this->authorize('update', $semester);
        $data = $request->validated();
        $semester->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function delete(Semester $semester)
    {
        $this->authorize('delete', $semester);
        $semester->delete();
        return back();
    }
    public function delete_any(Request $request)
    {
        $this->authorize('delete_any', Semester::class);
        if ($false/* mark */) {
            Semester::truncate();
        } else {
            Semester::destroy($request->input('id', []));
        }
        return back();
    }
    public function restore(Semester $semester)
    {
        $this->authorize('restore', $semester);
        return abort(501);
    }
}
