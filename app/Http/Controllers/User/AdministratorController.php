<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use App\Models\Classroom;
use App\Models\Employee;
use App\Models\FacilityAndInfrastructure;
use App\Models\Major;
use App\Models\ResourceForm;
use App\Models\ResourceTable;
use App\Models\SchoolInformation;
use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\Student;

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

    //SECTION - major
    public function major_list()
    {
        $resource = Major::tableable()->from_request(
            request: request(),
            columns: [
                'name', 'expertise', 'general_competence', 'special_competence',
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.administrator.major.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.major.update', ['major' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.major.delete', ['major' => $item]);
        };
        return view('pages.administrator.major.list', ['resource' => $resource]);
    }
    public function major_create()
    {
        $resource = Major::formable()->from_create(
            fields: [
                'name', 'expertise', 'general_competence', 'special_competence',
            ],
        );
        $resource->route_create = function () {
            return route('web.resource.major.create');
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.major.list');
        };
        return view('pages.administrator.major.create', ['resource' => $resource]);
    }
    public function major_update(Major $major)
    {
        $resource = Major::formable()->from_update(
            model: $major,
            fields: [
                'name', 'expertise', 'general_competence', 'special_competence',
            ],
        );
        $resource->route_update = function ($item) {
            return route('web.resource.major.update', ['major' => $item]);
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.major.list');
        };
        return view('pages.administrator.major.update', ['resource' => $resource]);
    }
    //!SECTION - major

    //SECTION - classroom
    public function classroom_list()
    {
        $resource = Classroom::tableable()->from_request(
            request: request(),
            columns: [
                'code',
                'name',
                'total_student',
                'description',
                'major',
                'homeroom',
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.administrator.classroom.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.classroom.update', ['classroom' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.classroom.delete', ['classroom' => $item]);
        };
        $resource->route_model = function ($definition, $item) {
            if ($definition->name == 'major') {
                return route('web.administrator.major.list');
            } else {
                return route('web.administrator.users.employee.list');
            }
        };
        return view('pages.administrator.classroom.list', ['resource' => $resource]);
    }
    public function classroom_create()
    {
        $resource = Classroom::formable()->from_create(
            fields: [
                'code',
                'name',
                'total_student',
                'description',
                'major',
                'homeroom',
            ],
        );
        $resource->route_create = function () {
            return route('web.resource.classroom.create');
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.classroom.list');
        };
        $resource->fetcher_model = function ($definition) {
            if ($definition->name == "major") {
                return Major::all();
            } else {
                return Employee::all();
            }
        };
        return view('pages.administrator.classroom.create', ['resource' => $resource]);
    }
    public function classroom_update(Classroom $classroom)
    {
        $resource = Classroom::formable()->from_update(
            model: $classroom,
            fields: [
                'code',
                'name',
                'total_student',
                'description',
                'major',
                'homeroom',
            ],
        );
        $resource->route_update = function ($item) {
            return route('web.resource.classroom.update', ['classroom' => $item]);
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.classroom.list');
        };
        $resource->fetcher_model = function ($definition) {
            if ($definition->name == "major") {
                return Major::all();
            } else {
                return Employee::all();
            }
        };
        return view('pages.administrator.classroom.update', ['resource' => $resource]);
    }
    //!SECTION - classroom

    //SECTION - student
    public function student_list()
    {
        $resource = Student::tableable()->from_request(
            request: request(),
            columns: [
                'nis',
                'nisn',
                'fullname',
                'gender',
                'grade',
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.administrator.users.student.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.users.student.update', ['student' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.student.delete', ['student' => $item]);
        };
        return view('pages.administrator.student.list', ['resource' => $resource]);
    }
    public function student_create()
    {
        $resource = Student::formable()->from_create(
            fields: [
                'photo',
                'name',
                'telp',
                'email',
                'password',

                'nis',
                'nisn',
                'fullname',
                'gender',
                'grade',
            ],
        );
        $resource->route_create = function () {
            return route('web.resource.student.create');
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.users.student.list');
        };
        return view('pages.administrator.student.create', ['resource' => $resource]);
    }
    public function student_update(Student $student)
    {
        $resource = Student::formable()->from_update(
            model: $student,
            fields: [
                'photo',
                'name',
                'telp',
                'email',
                'password',

                'nis',
                'nisn',
                'fullname',
                'gender',
                'grade',
            ],
        );
        $resource->route_update = function ($item) {
            return route('web.resource.student.update', ['student' => $item]);
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.users.student.list');
        };
        return view('pages.administrator.student.update', ['resource' => $resource]);
    }
    //!SECTION - student

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
