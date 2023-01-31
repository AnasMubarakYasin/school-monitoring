<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSchoolYearRequest;
use App\Http\Requests\UpdateSchoolYearRequest;
use App\Models\SchoolYear;
use Illuminate\Support\Carbon;

class SchoolYearController extends Controller
{
    public function create(CreateSchoolYearRequest $request)
    {
        $this->authorize('create', SchoolYear::class);
        $data = $request->validated();
        $data['name'] = Carbon::parse($data['start_at'])->year . "/" . Carbon::parse($data['end_at'])->year;
        SchoolYear::create($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateSchoolYearRequest $request, SchoolYear $school_year)
    {
        $this->authorize('update', $school_year);
        $data = $request->validated();
        $school_year->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function delete(SchoolYear $school_year)
    {
        $this->authorize('delete', $school_year);
        $school_year->delete();
        return back();
    }
    public function delete_any()
    {
        $this->authorize('delete_any', SchoolYear::class);
        return abort(501);
    }
    public function restore(SchoolYear $school_year)
    {
        $this->authorize('restore', $school_year);
        return abort(501);
    }
}
