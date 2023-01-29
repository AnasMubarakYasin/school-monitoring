<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;
use App\Models\Semester;
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
    public function update(UpdateSemesterRequest $request, Semester $school_year)
    {
        $this->authorize('update', $school_year);
        $data = $request->validated();
        return back();
    }
    public function delete(Semester $school_year)
    {
        $this->authorize('delete', $school_year);
        return back();
    }
    public function delete_any()
    {
        $this->authorize('delete_any', Semester::class);
        return back();
    }
    public function restore(Semester $school_year)
    {
        $this->authorize('restore', $school_year);
        return back();
    }
}
