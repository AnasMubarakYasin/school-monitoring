<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdministratorRequest;
use App\Http\Requests\UpdateAdministratorRequest;
use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Vite;

class AdministratorController extends Controller
{
    public function create(CreateAdministratorRequest $request)
    {
        $this->authorize('create', Administrator::class);
        $data = $request->validated();
        Administrator::create($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdateAdministratorRequest $request, Administrator $administrator)
    {
        $this->authorize('update', $administrator);
        $data = $request->validated();
        $administrator->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function delete(Administrator $administrator)
    {
        $this->authorize('delete', $administrator);
        $administrator->delete();
        return back();
    }
    public function delete_any(Request $request)
    {
        $this->authorize('delete_any', Administrator::class);
        if ($request->input('all')) {
            Administrator::truncate();
        } else {
            Administrator::destroy($request->input('id', []));
        }
        return back();
    }
    public function restore(Administrator $administrator)
    {
        $this->authorize('restore', $administrator);
        return abort(501);
    }
}
