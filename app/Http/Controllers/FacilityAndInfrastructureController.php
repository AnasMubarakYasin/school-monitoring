<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacilityAndInfrastructureRequest;
use App\Http\Requests\UpdateFacilityAndInfrastructureRequest;
use App\Models\FacilityAndInfrastructure;

class FacilityAndInfrastructureController extends Controller
{
    public function create(StoreFacilityAndInfrastructureRequest $request)
    {
        $this->authorize('create', FacilityAndInfrastructure::class);
        $data = $request->validated();

        FacilityAndInfrastructure::create($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateFacilityAndInfrastructureRequest $request, FacilityAndInfrastructure $facilityAndInfrastructure)
    {
        $this->authorize('update', $facilityAndInfrastructure);
        $data = $request->validated();
        $facilityAndInfrastructure->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function delete(FacilityAndInfrastructure $facilityAndInfrastructure)
    {
        $this->authorize('delete', $facilityAndInfrastructure);
        $facilityAndInfrastructure->delete();
        return back();
    }
    public function delete_any()
    {
        $this->authorize('delete_any', FacilityAndInfrastructure::class);
        return abort(501);
    }
    public function restore(FacilityAndInfrastructure $facilityAndInfrastructure)
    {
        $this->authorize('restore', $facilityAndInfrastructure);
        return back();
    }
}
