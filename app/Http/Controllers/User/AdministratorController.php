<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\ResourceForm;
use App\Models\ResourceTable;
use App\Models\School_Information;
use App\Models\SchoolYear;
use App\Models\Semester;

class AdministratorController extends Controller
{
    public function dashboard()
    {
        return view('pages.administrator.dashboard', [
            'administrator' => Administrator::count()
        ]);
    }
    public function profile()
    {
        return view('pages.administrator.profile');
    }
    public function notification()
    {
        return view('pages.administrator.notification');
    }
    public function empty()
    {
        return view('pages.administrator.empty');
    }

    public function school_year_list()
    {
        return view('pages.administrator.school_year.list');
    }
    public function school_year_create()
    {
        return view('pages.administrator.school_year.create');
    }
    public function semester_list()
    {
        $resource = ResourceTable::create(
            query: Semester::query(),
            fields: Semester::$fields,
            columns: ['name', 'part', 'state', 'start_at', 'end_at', 'school_year'],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->create = route('web.administrator.semester.create');
        $resource->route_update = function ($item) {
            return route('web.administrator.semester.update', ['semester' => $item]);
        };
        $resource->route_model = function ($field, $item) {
            return route('web.administrator.school_year.list');
        };
        return view('pages.administrator.semester.list', [
            'resource' => $resource,
        ]);
    }
    public function semester_create()
    {
        $resource = ResourceForm::create(
            model: new Semester(),
            fields: Semester::$fields,
        );
        $resource->create = route('web.resource.semester.create');
        $resource->view_any = route('web.administrator.semester.list');
        $resource->fetcher_model = function ($field) {
            return SchoolYear::all();
        };
        return view('pages.administrator.semester.create', [
            'resource' => $resource,
        ]);
    }
    public function semester_update(Semester $semester)
    {
        $resource = ResourceForm::create(
            model: $semester,
            fields: Semester::$fields,
        );
        $resource->create = route('web.resource.semester.create');
        $resource->view_any = route('web.administrator.semester.list');
        $resource->fetcher_model = function ($field) {
            return SchoolYear::all();
        };
        return view('pages.administrator.semester.update', [
            'resource' => $resource,
        ]);
    }

    public function administrator()
    {
        return view('pages.administrator.users.administrator.index');
    }

    // public function identitas_sekolah_list()
    // {
    //     $resource = ResourceTable::create(
    //         query: School_Information::query(),
    //         fields: School_Information::$fields,
    //         columns: [
    //             'name',
    //             'npsn',
    //             'nss',
    //             'status',
    //             'address',
    //             'village',
    //             'sub_district',
    //             'district',
    //             'province',
    //             'postal_code',
    //             'telp',
    //             'website',
    //         ],
    //         pagination: ['per' => 5, 'num' => 1],
    //     );
    //     $resource->create = route('web.administrator.data_master.school_information.create');
    //     $resource->route_update = function ($item) {
    //         return route('web.administrator.data_master.school_information.update', ['school_information' => $item]);
    //     };
    //     return view('pages.administrator.data_master.schol_information.list', [
    //         'resource' => $resource,
    //     ]);
    // }
    // public function identitas_sekolah_create()
    // {
    //     $resource = ResourceForm::create(
    //         model: new School_Information(),
    //         fields: School_Information::$fields,
    //     );
    //     $resource->create = route('web.resource.data_master.school_information.create');
    //     $resource->view_any = route('web.administrator.data_master.school_information.list');
    //     return view('pages.administrator.data_master.schol_information.create', [
    //         'resource' => $resource,
    //     ]);
    // }
    // public function identitas_sekolah_update(School_Information $school_information)
    // {
    //     $resource = ResourceForm::create(
    //         model: $school_information,
    //         fields: School_Information::$fields,
    //     );
    //     $resource->create = route('web.resource.data_master.school_information.create');
    //     $resource->view_any = route('web.administrator.data_master.school_information.list');
    //     return view('pages.administrator.data_master.schol_information.update', [
    //         'resource' => $resource,
    //     ]);
    // }

    public function identitas_sekolah_list()
    {
        // $resource = School_Information::all()->firstOrFail();
        // $data = [
        //     'resource' => $resource
        // ];
        // $resource->create = route('web.administrator.data_master.school_information.create');
        // $resource->route_update = function ($item) {
        //     return route('web.administrator.data_master.school_information.update', ['school_information' => $item]);
        // };
        return view('pages.administrator.data_master.schol_information.list');
    }
    // public function identitas_sekolah_create()
    // {

    //     return view('pages.administrator.data_master.schol_information.create');
    // }
    public function identitas_sekolah_update(School_Information $id)
    {
        $resource = ResourceForm::create(
            model: $id,
            fields: School_Information::$fields,
        );
        $resource->create = route('web.resource.data_master.school_information.create');
        // $resource->view_any = route('web.administrator.data_master.school_information.list');
        return view('pages.administrator.data_master.schol_information.update', [
            'resource' => $resource,
        ]);
    }
}
