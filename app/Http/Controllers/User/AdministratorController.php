<?php

namespace App\Http\Controllers\User;

use App\Dynamic\Flow\Administrator as FlowAdministrator;
use App\Http\Controllers\Controller;
use App\Models\AcademicActivity;
use App\Models\Administrator;
use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\Employee;
use App\Models\FacilityAndInfrastructure;
use App\Models\Major;
use App\Models\MaterialAndAssignment;
use App\Models\Presence;
use App\Models\ScheduleOfSubjects;
use App\Models\SchoolInformation;
use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subjects;

class AdministratorController extends Controller
{
    public function dashboard()
    {
        $school_year = SchoolYear::statable()->init();
        $school_year->route_view_any = function () {
            return route('web.administrator.academic_data.school_year.list');
        };
        $semester = Semester::statable()->init();
        $semester->route_view_any = function () {
            return route('web.administrator.academic_data.semester.list');
        };
        $employee = Employee::statable()->init();
        $employee->route_view_any = function () {
            return route('web.administrator.users.employee.list');
        };
        $student = Student::statable()->init();
        $student->route_view_any = function () {
            return route('web.administrator.users.student.list');
        };
        $major = Major::statable()->init();
        $major->route_view_any = function () {
            return route('web.administrator.data_master.major.list');
        };
        $classroom = Classroom::statable()->init();
        $classroom->route_view_any = function () {
            return route('web.administrator.data_master.classroom.list');
        };
        $facilityandinfrastructure = FacilityAndInfrastructure::statable()->init();
        $facilityandinfrastructure->route_view_any = function () {
            return route('web.administrator.data_master.facilityandinfrastructure.list');
        };
        $subjects = Subjects::statable()->init();
        $subjects->route_view_any = function () {
            return route('web.administrator.academic_data.subjects.list');
        };
        $scheduleofsubjects = ScheduleOfSubjects::statable()->init();
        $scheduleofsubjects->route_view_any = function () {
            return route('web.administrator.academic_data.scheduleofsubjects.list');
        };
        $materialandassignment = MaterialAndAssignment::statable()->init();
        $materialandassignment->route_view_any = function () {
            return route('web.administrator.academic_data.materialandassignment.list');
        };
        $presence = Presence::statable()->init();
        $presence->route_view_any = function () {
            return route('web.administrator.academic_data.presence.list');
        };
        $attendance = Attendance::statable()->init();
        $attendance->route_view_any = function () {
            return route('web.administrator.academic_data.attendance.list');
        };
        $academic_activity = AcademicActivity::statable()->init();
        $academic_activity->route_view_any = function () {
            return route('web.administrator.academic_data.academic_activity.list');
        };
        $flow = new FlowAdministrator();
        $stats = [
            $school_year,
            $semester,
            $employee,
            $student,
            $major,
            $classroom,
            $facilityandinfrastructure,
            $subjects,
            $scheduleofsubjects,
            $materialandassignment,
            $presence,
            $attendance,
            $academic_activity,
        ];
        $visitors =
            visits(Administrator::class)->period('day')->count() +
            visits(Employee::class)->period('day')->count() +
            visits(Student::class)->period('day')->count();
        $student = Student::all()->count();
        $academicactivity = AcademicActivity::all()->count();
        $teacher = Employee::all()->count();
        return view('pages.administrator.dashboard', [
            'stats' => $stats,
            'flow' => $flow,
            'visitors' => $visitors,
            'student' => $student,
            'academicactivity' => $academicactivity,
            'teacher' => $teacher,
        ]);
    }
    public function profile()
    {
        $resource = Administrator::formable()->from_update(
            model: auth()->user(),
            fields: ['photo', 'name', 'telp', 'email'],
        );
        return view('pages.administrator.profile', ['resource' => $resource]);
    }
    public function notification()
    {
        return view('pages.administrator.notification');
    }
    public function offline()
    {
        return view('pages.administrator.offline');
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
            return route('web.administrator.academic_data.school_year.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.academic_data.school_year.update', ['school_year' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.school_year.delete', ['school_year' => $item]);
        };
        $resource->route_relation = function ($field, $item) {
            return route('web.administrator.academic_data.semester.list');
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
            return route('web.administrator.academic_data.school_year.list');
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
            return route('web.administrator.academic_data.school_year.list');
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
            return route('web.administrator.academic_data.semester.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.academic_data.semester.update', ['semester' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.semester.delete', ['semester' => $item]);
        };
        $resource->route_relation = function ($field, $item) {
            return route('web.administrator.academic_data.school_year.list');
        };
        return view('pages.administrator.semester.list', ['resource' => $resource]);
    }
    public function semester_create()
    {
        $resource = Semester::formable()->from_create(
            fields: ['part', 'state', ['start_at', 'end_at'], 'school_year'],
        );
        $resource->route_create = function () {
            return route('web.resource.semester.create');
        };
        $resource->route_view_any = function () {
            return route('web.administrator.academic_data.semester.list');
        };
        $resource->fetcher_relation = function ($definition) {
            return SchoolYear::all();
        };
        return view('pages.administrator.semester.create', ['resource' => $resource]);
    }
    public function semester_update(Semester $semester)
    {
        $resource = Semester::formable()->from_update(
            model: $semester,
            fields: ['name', 'part', 'state', ['start_at', 'end_at'], 'school_year'],
        );
        $resource->route_update = function ($item) {
            return route('web.resource.semester.update', ['semester' => $item]);
        };
        $resource->route_view_any = function () {
            return route('web.administrator.academic_data.semester.list');
        };
        $resource->fetcher_relation = function ($definition) {
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
        $resource->route_delete_any = function ($item) {
            return route('web.resource.employee.delete_any');
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
                // 'password',

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
                'code', 'name', 'expertise', 'general_competence', 'special_competence',
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.administrator.data_master.major.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.data_master.major.update', ['major' => $item]);
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
                'code', 'name', 'expertise', 'general_competence', 'special_competence',
            ],
        );
        $resource->route_create = function () {
            return route('web.resource.major.create');
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.data_master.major.list');
        };
        return view('pages.administrator.major.create', ['resource' => $resource]);
    }
    public function major_update(Major $major)
    {
        $resource = Major::formable()->from_update(
            model: $major,
            fields: [
                'code', 'name', 'expertise', 'general_competence', 'special_competence',
            ],
        );
        $resource->route_update = function ($item) {
            return route('web.resource.major.update', ['major' => $item]);
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.data_master.major.list');
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
                'students',
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.administrator.data_master.classroom.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.data_master.classroom.update', ['classroom' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.classroom.delete', ['classroom' => $item]);
        };
        // $resource->route_relation = function ($definition, $item) {
        //     if ($definition->name == 'major') {
        //         return route('web.administrator.data_master.major.list');
        //     } else if ($definition->name == 'homeroom') {
        //         return route('web.administrator.users.employee.list');
        //     } {
        //         return route('web.administrator.users.student.list');
        //     }
        // };
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
                'students',
            ],
        );
        $resource->route_create = function () {
            return route('web.resource.classroom.create');
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.data_master.classroom.list');
        };
        $resource->fetcher_relation = function ($definition) {
            return match ($definition->name) {
                "major" => Major::all(),
                "students" => Student::all(),
                default => Employee::all(),
            };
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
                'students',
            ],
        );
        $resource->route_update = function ($item) {
            return route('web.resource.classroom.update', ['classroom' => $item]);
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.data_master.classroom.list');
        };
        $resource->fetcher_relation = function ($definition) {
            return match ($definition->name) {
                "major" => Major::all(),
                "students" => Student::all(),
                default => Employee::all(),
            };
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
                'major',
                'classroom',
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
        $resource->route_delete_any = function ($item) {
            return route('web.resource.student.delete_any');
        };
        $resource->route_import = function () {
            return route('web.resource.student.import');
        };
        $resource->route_relation = function ($definition, $item) {
            if ($definition->name == 'major') {
                return route('web.administrator.data_master.major.list');
            } else {
                return route('web.administrator.data_master.classroom.list');
            }
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
                'major',
                'classroom',
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
                // 'password',

                'nis',
                'nisn',
                'fullname',
                'gender',
                'grade',
                'major',
                'classroom',
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

    //SECTION - administrator
    public function administrator_list()
    {
        $resource = Administrator::tableable()->from_request(
            request: request(),
            columns: [
                'photo',
                "name",
                "email",
                'telp',
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.administrator.users.administrator.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.users.administrator.update', ['administrator' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.administrator.delete', ['administrator' => $item]);
        };
        $resource->route_delete_any = function ($item) {
            return route('web.resource.administrator.delete_any');
        };
        return view('pages.administrator.administrator.list', ['resource' => $resource]);
    }
    public function administrator_create()
    {
        $resource = Administrator::formable()->from_create(
            fields: [
                'photo',
                'name',
                'telp',
                'email',
                'password',
            ],
        );
        $resource->route_create = function () {
            return route('web.resource.administrator.create');
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.users.administrator.list');
        };
        return view('pages.administrator.administrator.create', ['resource' => $resource]);
    }
    public function administrator_update(Administrator $administrator)
    {
        $resource = Administrator::formable()->from_update(
            model: $administrator,
            fields: [
                'photo',
                'name',
                'telp',
                'email',
                // 'password',
            ],
        );
        $resource->route_update = function ($item) {
            return route('web.resource.administrator.update', ['administrator' => $item]);
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.users.administrator.list');
        };
        return view('pages.administrator.administrator.update', ['resource' => $resource]);
    }
    //!SECTION - administrator

    public function authorization()
    {
        return view('pages.administrator.authorization.list');
    }

    //SECTION - identitas sekolah
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
    //!SECTION

    //SECTION - facility and infrastructure
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
            pagination: ['per' => 5, 'num' => 1],
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
    //!SECTION

    //SECTION - Subjects
    public function subjects_list()
    {
        $resource = Subjects::tableable()->from_request(
            request: request(),
            columns: [
                'code',
                'name',
                'grade',
                'major',
                'teacher',
                'description',
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.administrator.academic_data.subjects.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.academic_data.subjects.update', ['subjects' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.academic_data.subjects.delete', ['subjects' => $item]);
        };
        $resource->route_relation = function ($definition, $item) {
            if ($definition->name == 'major') {
                return route('web.administrator.data_master.major.list');
            } else {
                return route('web.administrator.users.employee.list');
            }
        };
        return view('pages.administrator.academic_data.subjects.list', ['resource' => $resource]);
    }
    public function subjects_create()
    {
        $resource = Subjects::formable()->from_create(
            fields: [
                'code',
                'name',
                'grade',
                'major',
                'teacher',
                'description',
            ],
        );
        $resource->route_create = function () {
            return route('web.resource.academic_data.subjects.create');
        };
        $resource->route_view_any = function () {
            return route('web.administrator.academic_data.subjects.list');
        };
        $resource->fetcher_relation = function ($definition) {
            if ($definition->name == 'major') {
                return Major::all();
            } else {
                return Employee::all();
            }
        };
        return view('pages.administrator.academic_data.subjects.create', ['resource' => $resource]);
    }
    public function subjects_update(Subjects $subjects)
    {
        $resource = Subjects::formable()->from_update(
            model: $subjects,
            fields: [
                'code',
                'name',
                'grade',
                'major',
                'teacher',
                'description',
            ],
        );
        $resource->route_update = function ($item) {
            return route('web.resource.academic_data.subjects.update', ['subjects' => $item]);
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.academic_data.subjects.list');
        };
        $resource->fetcher_relation = function ($definition) {
            if ($definition->name == 'major') {
                return Major::all();
            } else {
                return Employee::all();
            }
        };
        return view('pages.administrator.academic_data.subjects.update', ['resource' => $resource]);
    }
    //!SECTION

    //SECTION - Scheduleofsubjects
    public function scheduleofsubjects_list()
    {
        $resource = ScheduleOfSubjects::tableable()->from_request(
            request: request(),
            columns: [
                'subjects',
                'classrooms',
                'teacher',
                'time',
                'day',
                'description'
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.administrator.academic_data.scheduleofsubjects.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.academic_data.scheduleofsubjects.update', ['scheduleOfSubjects' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.academic_data.scheduleofsubjects.delete', ['scheduleOfSubjects' => $item]);
        };
        $resource->route_relation = function ($definition, $item) {
            if ($definition->name == 'subjects') {
                return route('web.administrator.academic_data.subjects.list');
            } else if ($definition->name == 'classrooms') {
                return route('web.administrator.data_master.classroom.list');
            } else {
                return route('web.administrator.users.employee.list');
            }
        };
        return view('pages.administrator.academic_data.scheduleofsubjects.list', ['resource' => $resource]);
    }
    public function scheduleofsubjects_create()
    {
        $resource = ScheduleOfSubjects::formable()->from_create(
            fields: [
                'subjects',
                'classrooms',
                'teacher',
                [
                    'start_time',
                    'end_time',
                ],
                'day',
                'description'
            ],
        );
        $resource->route_create = function () {
            return route('web.resource.academic_data.scheduleofsubjects.create');
        };
        $resource->route_view_any = function () {
            return route('web.administrator.academic_data.scheduleofsubjects.list');
        };
        $resource->fetcher_relation = function ($definition) {
            if ($definition->name == 'subjects') {
                return Subjects::all();
            } else if ($definition->name == 'classrooms') {
                return Classroom::all();
            } else {
                return Employee::all();
            }
        };
        return view('pages.administrator.academic_data.scheduleofsubjects.create', ['resource' => $resource]);
    }
    public function scheduleofsubjects_update(ScheduleOfSubjects $scheduleOfSubjects)
    {
        $resource = ScheduleOfSubjects::formable()->from_update(
            model: $scheduleOfSubjects,
            fields: [
                'subjects',
                'classrooms',
                'teacher',
                [
                    'start_time',
                    'end_time',
                ],
                'day',
                'description'
            ],
        );
        $resource->route_update = function ($item) {
            return route('web.resource.academic_data.scheduleofsubjects.update', ['scheduleOfSubjects' => $item]);
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.academic_data.scheduleofsubjects.list');
        };
        $resource->fetcher_relation = function ($definition) {
            if ($definition->name == 'subjects') {
                return Subjects::all();
            } else if ($definition->name == 'classrooms') {
                return Classroom::all();
            } else {
                return Employee::all();
            }
        };
        return view('pages.administrator.academic_data.scheduleofsubjects.update', ['resource' => $resource]);
    }
    //!SECTION

    //SECTION - material and assignment
    public function materialandassignment_list()
    {
        $resource = MaterialAndAssignment::tableable()->from_request(
            request: request(),
            columns: [
                'subjects',
                'classroom',
                'teacher',
                'type',
                'start_at',
                'end_at',
                'description',
                'file'
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.administrator.academic_data.materialandassignment.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.academic_data.materialandassignment.update', ['materialAndAssignment' => $item]);
        };
        $resource->route_delete = function ($item) {
            return route('web.resource.academic_data.materialandassignment.delete', ['materialAndAssignment' => $item]);
        };
        $resource->route_relation = function ($definition, $item) {
            if ($definition->name == 'major') {
                return route('web.administrator.academic_data.subjects.list');
            } else if ($definition->name == 'classroom') {
                return route('web.administrator.data_master.classroom.list');
            } else {
                return route('web.administrator.users.employee.list');
            }
        };
        return view('pages.administrator.academic_data.materialandassigment.list', ['resource' => $resource]);
    }
    public function materialandassignment_create()
    {
        $resource = MaterialAndAssignment::formable()->from_create(
            fields: [
                'subjects',
                'classroom',
                'teacher',
                'type',
                'start_at',
                'end_at',
                'description',
                'file'
            ],
        );
        $resource->route_create = function () {
            return route('web.resource.academic_data.materialandassignment.create');
        };
        $resource->route_view_any = function () {
            return route('web.administrator.academic_data.materialandassignment.list');
        };
        $resource->fetcher_relation = function ($definition) {
            if ($definition->name == 'subjects') {
                return Subjects::all();
            } else if ($definition->name == 'classroom') {
                return Classroom::all();
            } else {
                return Employee::all();
            }
        };
        return view('pages.administrator.academic_data.materialandassigment.create', ['resource' => $resource]);
    }
    public function materialandassignment_update(MaterialAndAssignment $materialAndAssignment)
    {
        $resource = MaterialAndAssignment::formable()->from_update(
            model: $materialAndAssignment,
            fields: [
                'subjects',
                'classroom',
                'teacher',
                'type',
                'start_at',
                'end_at',
                'description',
                'file'
            ],
        );
        $resource->route_update = function ($item) {
            return route('web.resource.academic_data.materialandassignment.update', ['materialAndAssignment' => $item]);
        };
        $resource->route_view_any = function ($item) {
            return route('web.administrator.academic_data.materialandassignment.list');
        };
        $resource->fetcher_relation = function ($definition) {
            if ($definition->name == 'subjects') {
                return Subjects::all();
            } else if ($definition->name == 'classroom') {
                return Classroom::all();
            } else {
                return Employee::all();
            }
        };
        return view('pages.administrator.academic_data.materialandassigment.update', ['resource' => $resource]);
    }
    //!SECTION
    //SECTION - presence
    public function presence_list()
    {
        $resource = Presence::tableable()->from_request(
            request: request(),
            columns: [
                'name',

                'school_year',
                'semester',
                'teacher',
                'subjects',
                'classroom',
                'attendances',
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.administrator.academic_data.presence.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.academic_data.presence.update', ['presence' => $item]);
        };
        $resource->route_relation = function ($definition, $item) {
            return match ($definition->name) {
                'school year' => route('web.administrator.academic_data.school_year.list'),
                'semester' => route('web.administrator.academic_data.semester.list'),
                'teacher' => route('web.administrator.users.employee.list'),
                'subjects' => route('web.administrator.academic_data.subjects.list'),
                'classroom' => route('web.administrator.data_master.classroom.list'),
                'attendances' => route('web.administrator.academic_data.attendance.list'),
                default => ""
            };
        };
        return view('pages.administrator.presence.list', ['resource' => $resource]);
    }
    public function presence_create()
    {
        $resource = Presence::formable()->from_create(
            fields: [
                'name',

                'school_year',
                'semester',
                'teacher',
                'subjects',
                'classroom',
            ],
        );
        $resource->route_view_any = function () {
            return route('web.administrator.academic_data.presence.list');
        };
        return view('pages.administrator.presence.create', ['resource' => $resource]);
    }
    public function presence_update(Presence $presence)
    {
        $resource = Presence::formable()->from_update(
            model: $presence,
            fields: [
                'name',

                'school_year',
                'semester',
                'teacher',
                'subjects',
                'classroom',
            ],
        );
        $resource->route_view_any = function () {
            return route('web.administrator.academic_data.presence.list');
        };
        return view('pages.administrator.presence.update', ['resource' => $resource]);
    }
    //!SECTION - presence
    //SECTION - attendance
    public function attendance_list()
    {
        $resource = Attendance::tableable()->from_request(
            request: request(),
            columns: [
                'state',
                'description',

                'presence',
                'student',
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.administrator.academic_data.attendance.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.academic_data.attendance.update', ['attendance' => $item]);
        };
        $resource->route_relation = function ($definition, $item) {
            return match ($definition->name) {
                'presence' => route('web.administrator.academic_data.presence.list'),
                'student' => route('web.administrator.users.student.list'),
                default => ""
            };
        };
        return view('pages.administrator.attendance.list', ['resource' => $resource]);
    }
    public function attendance_create()
    {
        $resource = Attendance::formable()->from_create(
            fields: [
                'state',
                'description',

                'presence',
                'student',
            ],
        );
        $resource->route_view_any = function () {
            return route('web.administrator.academic_data.attendance.list');
        };
        return view('pages.administrator.attendance.create', ['resource' => $resource]);
    }
    public function attendance_update(Attendance $attendance)
    {
        $resource = Attendance::formable()->from_update(
            model: $attendance,
            fields: [
                'state',
                'description',

                'presence',
                'student',
            ],
        );
        $resource->route_view_any = function () {
            return route('web.administrator.academic_data.attendance.list');
        };
        return view('pages.administrator.attendance.update', ['resource' => $resource]);
    }
    //!SECTION - attendance
    //SECTION - academic_activity
    public function academic_activity_list()
    {
        $resource = AcademicActivity::tableable()->from_request(
            request: request(),
            columns: [
                'name',
                'duration',
                'executive',
                'type',
                'start_at',
                'end_at',
                'description',
            ],
            pagination: ['per' => 5, 'num' => 1],
        );
        $resource->route_store = function () {
            return route('web.administrator.academic_data.academic_activity.create');
        };
        $resource->route_edit = function ($item) {
            return route('web.administrator.academic_data.academic_activity.update', ['academic_activity' => $item]);
        };
        $resource->route_relation = function ($definition, $item) {
            return match ($definition->name) {
                default => $definition->name
            };
        };
        return view('pages.administrator.academic_activity.list', ['resource' => $resource]);
    }
    public function academic_activity_create()
    {
        $resource = AcademicActivity::formable()->from_create(
            fields: [
                'name',
                'duration',
                'executive',
                'type',
                'start_at',
                'end_at',
                'description',
            ],
        );
        $resource->route_view_any = function () {
            return route('web.administrator.academic_data.academic_activity.list');
        };
        return view('pages.administrator.academic_activity.create', ['resource' => $resource]);
    }
    public function academic_activity_update(AcademicActivity $academic_activity)
    {
        $resource = AcademicActivity::formable()->from_update(
            model: $academic_activity,
            fields: [
                'name',
                'duration',
                'executive',
                'type',
                'start_at',
                'end_at',
                'description',
            ],
        );
        $resource->route_view_any = function () {
            return route('web.administrator.academic_data.academic_activity.list');
        };
        return view('pages.administrator.academic_activity.update', ['resource' => $resource]);
    }
    public function evaluation_list()
    {
        $data = Student::all();
        return view('pages.administrator.evaluation', ['evaluations' => $data]);
    }
}
