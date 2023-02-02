<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\Employee;
use App\Models\FacilityAndInfrastructure;
use App\Models\ResourceForm;
use App\Models\ResourceTable;
use App\Models\SchoolInformation;
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

    //SECTION - school_year
    public function school_year_list()
    {
        $resource = SchoolYear::tableable()->from_request(
            request: request(),
            columns: ['name', 'state', 'start_at', 'end_at', 'semesters'],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.administrator.school_year.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.school_year.update', ['school_year' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.school_year.delete', ['school_year' => $item]);
        };
        $resource->route_model = function ($field, $item) {
            return route('web.administrator.semester.list');
        };
        return view('pages.administrator.school_year.list', ['resource' => $resource]);
    }
    public function school_year_create()
    {
        $resource = SchoolYear::formable()->from_create(
            fields: ['state', 'start_at', 'end_at'],
        );
        $resource->route_create = function () {
            return route('web.resource.school_year.create');
        };
        $resource->route_view_any = function () {
            return route('web.administrator.school_year.list');
        };
        return view('pages.administrator.school_year.create', ['resource' => $resource]);
    }
    public function school_year_update(SchoolYear $school_year)
    {
        $resource = SchoolYear::formable()->from_update(
            model: $school_year,
            fields: ['name', 'state', 'start_at', 'end_at'],
        );
        $resource->route_update = function ($item) {
            return route('web.resource.school_year.update', ['school_year' => $item]);
        };
        $resource->route_view_any = function () {
            return route('web.administrator.school_year.list');
        };
        return view('pages.administrator.school_year.update', ['resource' => $resource]);
    }
    //!SECTION - school_year

    //SECTION - semester
    public function semester_list()
    {
        $resource = Semester::tableable()->from_request(
            request: request(),
            columns: ['name', 'part', 'state', 'start_at', 'end_at', 'school_year'],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.administrator.semester.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.semester.update', ['semester' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.semester.delete', ['semester' => $item]);
        };
        $resource->route_model = function ($field, $item) {
            return route('web.administrator.school_year.list');
        };
        return view('pages.administrator.semester.list', ['resource' => $resource]);
    }
    public function semester_create()
    {
        $resource = Semester::formable()->from_create(
            fields: ['part', 'state', 'start_at', 'end_at', 'school_year'],
        );
        $resource->route_create = function () {
            return route('web.resource.semester.create');
        };
        $resource->route_view_any = function () {
            return route('web.administrator.semester.list');
        };
        $resource->fetcher_model = function ($definition) {
            return SchoolYear::all();
        };
        return view('pages.administrator.semester.create', ['resource' => $resource]);
    }
    public function semester_update(Semester $semester)
    {
        $resource = Semester::formable()->from_update(
            model: $semester,
            fields: ['name', 'part', 'state', 'start_at', 'end_at', 'school_year'],
        );
        $resource->route_update = function ($item) {
            return route('web.resource.semester.update', ['semester' => $item]);
        };
        $resource->route_view_any = function () {
            return route('web.administrator.semester.list');
        };
        $resource->fetcher_model = function ($definition) {
            return SchoolYear::all();
        };
        return view('pages.administrator.semester.update', ['resource' => $resource]);
    }
    //!SECTION - semester

    //SECTION - employee
    public function employee_list()
    {
        $resource = Employee::tableable()->from_request(
            request: request(),
            columns: ['nip', 'fullname', 'telp', 'gender', 'state', 'task'],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.administrator.users.employee.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.users.employee.update', ['employee' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.employee.delete', ['employee' => $item]);
        };
        return view('pages.administrator.employee.list', ['resource' => $resource]);
    }
    public function employee_create()
    {
        $resource = Employee::formable()->from_create(
            fields: [
                'photo',
                'name',
                'telp',
                'email',
                'password',

                'nip',
                'fullname',
                'gender',
                'state',
                'task',
            ],
        );
        $resource->route_create = function () {
            return route('web.resource.employee.create');
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.users.employee.list');
        };
        return view('pages.administrator.employee.create', ['resource' => $resource]);
    }
    public function employee_update(Employee $employee)
    {
        $resource = Employee::formable()->from_update(
            model: $employee,
            fields: [
                'photo',
                'name',
                'telp',
                'email',
                'password',

                'nip',
                'fullname',
                'gender',
                'state',
                'task',
            ],
        );
        $resource->route_update = function ($item) {
            return route('web.resource.employee.update', ['employee' => $item]);
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.users.employee.list');
        };
        return view('pages.administrator.employee.update', ['resource' => $resource]);
    }
    //!SECTION - employee

    public function administrator()
    {
        return view('pages.administrator.users.administrator.index');
    }

    //!section - identitas sekolah
    public function identitas_sekolah_list()
    {
        return view('pages.administrator.data_master.schol_information.list');
    }
    public function identitas_sekolah_update(SchoolInformation $schoolInformation)
    {
        $resource = SchoolInformation::formable()->from_update(
            model: $schoolInformation,
            fields: [
                'name',
                'npsn',
                'nss',
                'status',
                'address',
                'village',
                'sub_district',
                'district',
                'province',
                'postal_code',
                'telp',
                'website',
            ],
        );
        $resource->route_update = function ($item) {
            return route('web.resource.data_master.school_information.update', ['schoolInformation' => $item]);
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.data_master.school_information.list');
        };
        // $resource->view_any = route('web.administrator.data_master.school_information.list');
        return view('pages.administrator.data_master.schol_information.update', [
            'resource' => $resource,
        ]);
    }

    //!section - facility and infrastructure
    public function facilityandinfrastructure_list()
    {
        $resource = FacilityAndInfrastructure::tableable()->from_request(
            request: request(),
            columns: [
                'name',
                'amount',
                'condition',
                'sarana_prasarana',
                'responsible_person',
                'description',
            ],
            pagination: null,
        );
        $resource->route_store = function () {
            return route('web.administrator.data_master.facilityandinfrastructure.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.data_master.facilityandinfrastructure.update', ['facilityAndInfrastructure' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.data_master.facilityAndInfrastructure.delete', ['facilityAndInfrastructure' => $item]);
        };
        return view('pages.administrator.data_master.facilitiandinfrastructure.list', ['resource' => $resource]);
    }
    public function facilityandinfrastructure_create()
    {
        $resource = FacilityAndInfrastructure::formable()->from_create(
            fields: [
                'name',
                'amount',
                'condition',
                'sarana_prasarana',
                'responsible_person',
                'description',
            ],
        );
        $resource->route_create = function () {
            return route('web.resource.data_master.facilityAndInfrastructure.create');
        };
        $resource->route_view_any = function () {
            return route('web.administrator.data_master.facilityandinfrastructure.list');
        };
        return view('pages.administrator.data_master.facilitiandinfrastructure.create', ['resource' => $resource]);
    }
    public function facilityandinfrastructure_update(FacilityAndInfrastructure $facilityAndInfrastructure)
    {
        $resource = FacilityAndInfrastructure::formable()->from_update(
            model: $facilityAndInfrastructure,
            fields: [
                'name',
                'amount',
                'condition',
                'sarana_prasarana',
                'responsible_person',
                'description',
            ],
        );
        $resource->route_update = function ($item) {
            return route('web.resource.data_master.facilityAndInfrastructure.update', ['facilityAndInfrastructure' => $item]);
        };
        $resource->route_view_any = function () {
            return route('web.administrator.data_master.facilityandinfrastructure.list');
        };
        return view('pages.administrator.data_master.facilitiandinfrastructure.update', ['resource' => $resource]);
    }
}
