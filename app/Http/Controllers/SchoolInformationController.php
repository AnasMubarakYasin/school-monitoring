<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInformationRequest;
use App\Http\Requests\UpdateInformationRequest;
use App\Models\School_Information;
use Illuminate\Http\Request;

class SchoolInformationController extends Controller
{
    public function create(CreateInformationRequest $request)
    {
        $this->authorize('create', School_Information::class);
        $data = $request->validated();

        School_Information::create($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateInformationRequest $request, School_Information $school_Information)
    {
        $this->authorize('update', $school_Information);
        $data = $request->validated();
        return back();
    }
    public function delete(School_Information $school_Information)
    {
        $this->authorize('delete', $school_Information);
        return back();
    }
    public function delete_any()
    {
        $this->authorize('delete_any', School_Information::class);
        return back();
    }
    public function restore(School_Information $school_Information)
    {
        $this->authorize('restore', $school_Information);
        return back();
    }
}
