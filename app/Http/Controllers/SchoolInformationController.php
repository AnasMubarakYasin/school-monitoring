<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInformationRequest;
use App\Http\Requests\UpdateInformationRequest;
use App\Models\SchoolInformation;
use Illuminate\Http\Request;

class SchoolInformationController extends Controller
{
    public function create(CreateInformationRequest $request)
    {
        $this->authorize('create', SchoolInformation::class);
        $data = $request->validated();

        SchoolInformation::create($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateInformationRequest $request, SchoolInformation $schoolInformation)
    {
        $this->authorize('update', $schoolInformation);
        $data = $request->validated();
        $schoolInformation->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function delete(SchoolInformation $schoolInformation)
    {
        $this->authorize('delete', $schoolInformation);
        return back();
    }
    public function delete_any()
    {
        $this->authorize('delete_any', SchoolInformation::class);
        return back();
    }
    public function restore(SchoolInformation $schoolInformation)
    {
        $this->authorize('restore', $schoolInformation);
        return back();
    }
}
