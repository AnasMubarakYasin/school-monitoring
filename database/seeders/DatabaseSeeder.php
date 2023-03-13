<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AcademicActivity;
use App\Models\Administrator;
use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\Employee;
use App\Models\SchoolInformation;
use App\Models\Major;
use App\Models\MaterialAndAssignment;
use App\Models\Presence;
use App\Models\ScheduleOfSubjects;
use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subjects;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $administrator = Administrator::factory()->create([
            'name' => 'admin',
            'email' => 'admin@host.local',
            'password' => 'admin',
        ]);
        $staff = Employee::factory()->create([
            'name' => 'staff',
            'email' => 'staff@host.local',
            'password' => 'staff',
            'task' => 'staff',
            'fullname' => 'staff',
        ]);
        SchoolInformation::create([
            'name' => '',
            'npsn' => '',
            'nss' => '',
            'status' => 'Negeri',
            'address' => '',
            'village' => '',
            'sub_district' => '',
            'district' => '',
            'province' => '',
            'postal_code' => '',
            'telp' => '',
            'website' => '',
        ]);

        if (env('APP_ENV') != 'local') return;

        // $teacher = Employee::factory()->create([
        //     'name' => 'teacher',
        //     'email' => 'teacher@host.local',
        //     'password' => 'teacher',
        //     'task' => 'teacher',
        // ]);

        // $employees = Employee::factory(30)->create();
        AcademicActivity::factory()->count(10)->create();

        $school_year = SchoolYear::factory()->create([
            'name' => now()->year . "/" . now()->addYear()->year,
            'state' => 'ongoing',
            'start_at' => now(),
            'end_at' => now()->addYear(),
        ]);
        $semester_odd = Semester::factory()->create([
            'name' => $school_year->start_at->year . "/" . 'odd',
            'part' => 'odd',
            'state' => 'ongoing',
            'start_at' => $school_year->start_at,
            'end_at' => Carbon::parse($school_year->start_at)->addMonths(6),
            'school_year_id' => $school_year->id,
        ]);
        $semester_even = Semester::factory()->create([
            'name' => $school_year->end_at->year . "/" . 'even',
            'part' => 'even',
            'state' => 'planned',
            'start_at' => Carbon::parse($school_year->start_at)->addMonths(7),
            'end_at' => $school_year->end_at,
            'school_year_id' => $school_year->id,
        ]);

        $major_ipa = Major::factory()->create([
            'name' => 'ipa',
            'code' => 'ipa',
            'expertise' => 'kimia',
        ]);
        $major_ips = Major::factory()->create([
            'name' => 'ips',
            'code' => 'ips',
            'expertise' => 'ekonomi',
        ]);
        $major_language = Major::factory()->create([
            'name' => 'language',
            'code' => 'language',
            'expertise' => 'language',
        ]);

        $teacher_kimia = Employee::factory()->create([
            'name' => 'kimia_teacher',
            'email' => 'kimia_teacher@host.local',
            'password' => 'kimia_teacher',
            'task' => 'teacher',
            'fullname' => 'kimia_teacher',
        ]);
        $teacher_biology = Employee::factory()->create([
            'name' => 'biology_teacher',
            'email' => 'biology_teacher@host.local',
            'password' => 'biology_teacher',
            'task' => 'teacher',
            'fullname' => 'biology_teacher',
        ]);
        $teacher_physics = Employee::factory()->create([
            'name' => 'physics_teacher',
            'email' => 'physics_teacher@host.local',
            'password' => 'physics_teacher',
            'task' => 'teacher',
            'fullname' => 'physics_teacher',
        ]);

        $subjects_basic_kimia = Subjects::factory()->create([
            'name' => 'basic kimia',
            'grade' => 10,
            'major_id' => $major_ipa->id,
            'teacher_id' => $teacher_kimia->id,
        ]);
        $subjects_common_biology = Subjects::factory()->create([
            'name' => 'common biology',
            'grade' => 10,
            'major_id' => $major_ipa->id,
            'teacher_id' => $teacher_biology->id,
        ]);
        $subjects_basic_physics = Subjects::factory()->create([
            'name' => 'basic physics',
            'grade' => 10,
            'major_id' => $major_ipa->id,
            'teacher_id' => $teacher_biology->id,
        ]);

        $subjects_intermediate_kimia = Subjects::factory()->create([
            'name' => 'intermediate kimia',
            'grade' => 11,
            'major_id' => $major_ipa->id,
            'teacher_id' => $teacher_kimia->id,
        ]);
        $subjects_specifik_biology = Subjects::factory()->create([
            'name' => 'specifik biology',
            'grade' => 11,
            'major_id' => $major_ipa->id,
            'teacher_id' => $teacher_biology->id,
        ]);
        $subjects_intermediate_physics = Subjects::factory()->create([
            'name' => 'intermediate physics',
            'grade' => 11,
            'major_id' => $major_ipa->id,
            'teacher_id' => $teacher_biology->id,
        ]);

        $homeroom_10_a =  Employee::factory()->create(['task' => 'teacher']);
        $homeroom_10_b =  Employee::factory()->create(['task' => 'teacher']);
        $homeroom_11_a =  Employee::factory()->create(['task' => 'teacher']);

        $classroom_10_a = Classroom::factory()
            ->create([
                'name' => '10 a',
                'major_id' => $major_ipa->id,
                'homeroom_id' => $homeroom_10_a->id,
            ]);
        $classroom_10_b = Classroom::factory()
            ->create([
                'name' => '10 b',
                'major_id' => $major_ipa->id,
                'homeroom_id' => $homeroom_10_b->id,
            ]);
        $classroom_11_a = Classroom::factory()
            ->create([
                'name' => '11 a',
                'major_id' => $major_ips->id,
                'homeroom_id' => $homeroom_11_a->id,
            ]);

        $schedule_basic_kimia_10_a = ScheduleOfSubjects::factory()->create([
            'subjects_id' => $subjects_basic_kimia->id,
            'class_id' => $classroom_10_a->id,
            'teacher_id' => $teacher_kimia->id,
            'start_at' => today()->setHour(8),
            'end_at' => today()->setHour(9),
            'day' => 'senin',
            'description' => '',
        ]);
        $schedule_common_biology_10_a = ScheduleOfSubjects::factory()->create([
            'subjects_id' => $subjects_common_biology->id,
            'class_id' => $classroom_10_a->id,
            'teacher_id' => $teacher_biology->id,
            'start_at' => today()->setHour(8),
            'end_at' => today()->setHour(9),
            'day' => 'selasa',
            'description' => '',
        ]);
        $schedule_basic_physics_10_a = ScheduleOfSubjects::factory()->create([
            'subjects_id' => $subjects_basic_physics->id,
            'class_id' => $classroom_10_a->id,
            'teacher_id' => $teacher_physics->id,
            'start_at' => today()->setHour(8),
            'end_at' => today()->setHour(9),
            'day' => 'rabu',
            'description' => '',
        ]);

        $schedule_basic_kimia_10_b = ScheduleOfSubjects::factory()->create([
            'subjects_id' => $subjects_basic_kimia->id,
            'class_id' => $classroom_10_b->id,
            'teacher_id' => $teacher_kimia->id,
            'start_at' => today()->setHour(8),
            'end_at' => today()->setHour(9),
            'day' => 'kamis',
            'description' => '',
        ]);
        $schedule_common_biology_10_b = ScheduleOfSubjects::factory()->create([
            'subjects_id' => $subjects_common_biology->id,
            'class_id' => $classroom_10_b->id,
            'teacher_id' => $teacher_biology->id,
            'start_at' => today()->setHour(8),
            'end_at' => today()->setHour(9),
            'day' => 'jumat',
            'description' => '',
        ]);
        $schedule_basic_physics_10_b = ScheduleOfSubjects::factory()->create([
            'subjects_id' => $subjects_basic_physics->id,
            'class_id' => $classroom_10_b->id,
            'teacher_id' => $teacher_physics->id,
            'start_at' => today()->setHour(8),
            'end_at' => today()->setHour(9),
            'day' => 'sabtu',
            'description' => '',
        ]);

        $schedule_basic_kimia_11_a = ScheduleOfSubjects::factory()->create([
            'subjects_id' => $subjects_intermediate_kimia->id,
            'class_id' => $classroom_11_a->id,
            'teacher_id' => $teacher_kimia->id,
            'start_at' => today()->setHour(9),
            'end_at' => today()->setHour(10),
            'day' => 'senin',
            'description' => '',
        ]);
        $schedule_common_biology_11_a = ScheduleOfSubjects::factory()->create([
            'subjects_id' => $subjects_specifik_biology->id,
            'class_id' => $classroom_11_a->id,
            'teacher_id' => $teacher_biology->id,
            'start_at' => today()->setHour(9),
            'end_at' => today()->setHour(10),
            'day' => 'selasa',
            'description' => '',
        ]);
        $schedule_basic_physics_11_a = ScheduleOfSubjects::factory()->create([
            'subjects_id' => $subjects_intermediate_physics->id,
            'class_id' => $classroom_11_a->id,
            'teacher_id' => $teacher_physics->id,
            'start_at' => today()->setHour(9),
            'end_at' => today()->setHour(10),
            'day' => 'rabu',
            'description' => '',
        ]);

        $student_10_a_1 = Student::factory()
            ->create([
                'name' => '10_a_1',
                'email' => '10_a_1@host.local',
                'password' => '10_a_1',
                'fullname' => '10_a_1',
                'grade' => 10,
                'major_id' => $major_ipa->id,
                'classroom_id' => $classroom_10_a->id,
            ]);
        $student_10_a_2 = Student::factory()
            ->create([
                'name' => '10_a_2',
                'email' => '10_a_2@host.local',
                'password' => '10_a_2',
                'fullname' => '10_a_2',
                'grade' => 10,
                'major_id' => $major_ipa->id,
                'classroom_id' => $classroom_10_a->id,
            ]);
        $student_10_b_1 = Student::factory()
            ->create([
                'name' => '10_b_1',
                'email' => '10_b_1@host.local',
                'password' => '10_b_1',
                'fullname' => '10_b_1',
                'grade' => 10,
                'major_id' => $major_ipa->id,
                'classroom_id' => $classroom_10_b->id,
            ]);
        $student_10_b_2 = Student::factory()
            ->create([
                'name' => '10_b_2',
                'email' => '10_b_2@host.local',
                'password' => '10_b_2',
                'fullname' => '10_b_2',
                'grade' => 10,
                'major_id' => $major_ipa->id,
                'classroom_id' => $classroom_10_b->id,
            ]);
        $student_11_a_1 = Student::factory()
            ->create([
                'name' => '11_a_1',
                'email' => '11_a_1@host.local',
                'password' => '11_a_1',
                'fullname' => '11_a_1',
                'grade' => 11,
                'major_id' => $major_ips->id,
                'classroom_id' => $classroom_11_a->id,
            ]);
        $student_11_a_2 = Student::factory()
            ->create([
                'name' => '11_a_2',
                'email' => '11_a_2@host.local',
                'password' => '11_a_2',
                'fullname' => '11_a_2',
                'grade' => 11,
                'major_id' => $major_ips->id,
                'classroom_id' => $classroom_11_a->id,
            ]);

        // $students_kimia_10 = Student::factory()
        //     ->count(10)
        //     ->create([
        //         'major_id' => $major_ipa->id,
        //         'classroom_id' => $classroom_10_a->id,
        //     ]);
        // $students_biology_10 = Student::factory()
        //     ->count(10)
        //     ->create([
        //         'major_id' => $major_ips->id,
        //         'classroom_id' => $classroom_11_a->id,
        //     ]);

        // $classrooms = Classroom::factory()
        //     ->count(15)
        //     ->state(new Sequence(
        //         ['major_id' => $major_ipa->id],
        //         ['major_id' => $major_ips->id],
        //         ['major_id' => $major_language->id],
        //     ))->state(new Sequence(
        //         ...$employees->map(function ($item) {
        //             return ['homeroom_id' => $item->id];
        //         })->toArray()
        //     ))->create();

        // $student = Student::factory()->create([
        //     'name' => 'student',
        //     'email' => 'student@host.local',
        //     'password' => 'student',
        //     'major_id' => $major_ipa->id,
        //     'classroom_id' => $classroom_10_a->id,
        // ]);
        // $students = Student::factory()
        //     ->count(90)
        //     ->state(new Sequence(
        //         ['major_id' => $major_ipa->id],
        //         ['major_id' => $major_ips->id],
        //         ['major_id' => $major_language->id],
        //     ))->state(new Sequence(
        //         ...$classrooms->map(function ($item) {
        //             return ['classroom_id' => $item->id];
        //         })->toArray()
        //     ))->create();

        // $presence_kimia_10 = Presence::factory()
        //     ->create([
        //         'name' => 'kimia 10',
        //         'school_year_id' => $school_year->id,
        //         'semester_id' => $semester_odd->id,
        //         'teacher_id' => $teacher_kimia->id,
        //         'subjects_id' => $subjects_basic_kimia->id,
        //         'classroom_id' => $classroom_11_a->id,
        //     ]);
        // $presence_biology_10 = Presence::factory()
        //     ->create([
        //         'name' => 'biology 10',
        //         'school_year_id' => $school_year->id,
        //         'semester_id' => $semester_odd->id,
        //         'teacher_id' => $teacher_biology->id,
        //         'subjects_id' => $subjects_common_biology->id,
        //         'classroom_id' => $classroom_10_a->id,
        //     ]);
        // $attendance = Attendance::factory()
        //     ->count(16)
        //     ->create([
        //         'presence_id' => $presence_kimia_10->id,
        //         'student_id' => $student_10_a_1->id,
        //     ]);
        // $attendance = Attendance::factory()
        //     ->count(16)
        //     ->create([
        //         'presence_id' => $presence_biology_10->id,
        //         'student_id' => $student_11_a_1->id,
        //     ]);
        // MaterialAndAssignment::factory()
        //     ->count(16)
        //     ->create([
        //         'subjects_id' => $subjects_basic_kimia->id,
        //         'classroom_id' => $classroom_10_a->id,
        //         'teacher_id' => $teacher_kimia->id,
        //     ]);
        // MaterialAndAssignment::factory()
        //     ->count(16)
        //     ->create([
        //         'subjects_id' => $subjects_common_biology->id,
        //         'classroom_id' => $classroom_11_a->id,
        //         'teacher_id' => $teacher_biology->id,
        //     ]);
    }
}
