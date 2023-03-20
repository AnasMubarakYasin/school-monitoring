<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePresenceRequest;
use App\Http\Requests\UpdatePresenceRequest;
use App\Models\Attendance;
use App\Models\Presence;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function generate()
    {
        Presence::generate();
        return back();
    }
    public function create(CreatePresenceRequest $request)
    {
        $this->authorize('create', Presence::class);
        $data = $request->validated();
        Presence::create($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function update(UpdatePresenceRequest $request, Presence $presence)
    {
        $this->authorize('update', $presence);
        $data = $request->validated();
        $presence->update($data);
        return redirect()->intended($request->input('_view_any'));
    }
    public function attendance(Request $request, Presence $presence)
    {
        foreach ($request->input("attendances") as $id => $value) {
            if (!is_null($value)) {
                Attendance::find($id)->update(["state" => $value == "on" ? "present" : "unpresent"]);
            }
        }
        return back();
    }
    public function delete(Presence $presence)
    {
        $this->authorize('delete', $presence);
        $presence->delete();
        return back();
    }
    public function delete_any()
    {
        $request = request();
        $this->authorize('delete_any', Presence::class);
        if ($request->input('all')) {
            Presence::truncate();
        } else {
            Presence::destroy($request->input('id', []));
        }
        return back();
    }
    public function restore(Presence $presence)
    {
        $this->authorize('restore', $presence);
        return abort(501);
    }
}
