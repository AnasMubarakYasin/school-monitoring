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
use App\Models\Presence;
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
        $teacher = Employee::factory()->create([
            'name' => 'teacher',
            'email' => 'teacher@host.local',
            'password' => 'teacher',
            'task' => 'teacher',
        ]);

        $employees = Employee::factory(30)->create();
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
        AcademicActivity::factory()->count(30)->create();
        $major_ipa = Major::factory()->create([
            'name' => 'ipa',
            'code' => 'ipa',
            'expertise' => 'kimia',
        ]);
        $major_ips = Major::factory()->create([
            'name' => 'ips',
            'code' => 'ips',
            'expertise' => 'biology',
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
        ]);
        $teacher_biology = Employee::factory()->create([
            'name' => 'biology_teacher',
            'email' => 'biology_teacher@host.local',
            'password' => 'biology_teacher',
            'task' => 'teacher',
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
            'major_id' => $major_ips->id,
            'teacher_id' => $teacher_biology->id,
        ]);
        $homeroom_kimia_10 =  Employee::factory()->create(['task' => 'teacher']);
        $homeroom_biology_10 =  Employee::factory()->create(['task' => 'teacher']);
        $classroom_kimia_10 = Classroom::factory()
            ->create([
                'name' => 'kimia 10',
                'major_id' => $major_ipa->id,
                'homeroom_id' => $homeroom_kimia_10->id,
            ]);
        $classroom_biology_10 = Classroom::factory()
            ->create([
                'name' => 'biology 10',
                'major_id' => $major_ips->id,
                'homeroom_id' => $homeroom_biology_10->id,
            ]);
        $student_abcd = Student::factory()
            ->create([
                'name' => 'abcd',
                'email' => 'abcd@host.local',
                'password' => 'abcd',
                'fullname' => 'abcd',
                'grade' => 10,
                'major_id' => $major_ipa->id,
                'classroom_id' => $classroom_kimia_10->id,
            ]);
        $student_efgh = Student::factory()
            ->create([
                'name' => 'efgh',
                'email' => 'efgh@host.local',
                'password' => 'efgh',
                'fullname' => 'efgh',
                'grade' => 10,
                'major_id' => $major_ips->id,
                'classroom_id' => $classroom_biology_10->id,
            ]);
        $students_kimia_10 = Student::factory()
            ->count(10)
            ->create([
                'major_id' => $major_ipa->id,
                'classroom_id' => $classroom_kimia_10->id,
            ]);
        $students_biology_10 = Student::factory()
            ->count(10)
            ->create([
                'major_id' => $major_ips->id,
                'classroom_id' => $classroom_biology_10->id,
            ]);
        $classrooms = Classroom::factory()
            ->count(15)
            ->state(new Sequence(
                ['major_id' => $major_ipa->id],
                ['major_id' => $major_ips->id],
                ['major_id' => $major_language->id],
            ))->state(new Sequence(
                ...$employees->map(function ($item) {
                    return ['homeroom_id' => $item->id];
                })->toArray()
            ))->create();
        $student = Student::factory()->create([
            'name' => 'student',
            'email' => 'student@host.local',
            'password' => 'student',
            'major_id' => $major_ipa->id,
            'classroom_id' => $classroom_kimia_10->id,
        ]);
        $students = Student::factory()
            ->count(90)
            ->state(new Sequence(
                ['major_id' => $major_ipa->id],
                ['major_id' => $major_ips->id],
                ['major_id' => $major_language->id],
            ))->state(new Sequence(
                ...$classrooms->map(function ($item) {
                    return ['classroom_id' => $item->id];
                })->toArray()
            ))->create();
        $presence_kimia_10 = Presence::factory()
            ->create([
                'name' => 'kimia 10',
                'school_year_id' => $school_year->id,
                'semester_id' => $semester_odd->id,
                'teacher_id' => $teacher_kimia->id,
                'subjects_id' => $subjects_basic_kimia->id,
                'classroom_id' => $classroom_biology_10->id,
            ]);
        $presence_biology_10 = Presence::factory()
            ->create([
                'name' => 'biology 10',
                'school_year_id' => $school_year->id,
                'semester_id' => $semester_odd->id,
                'teacher_id' => $teacher_biology->id,
                'subjects_id' => $subjects_common_biology->id,
                'classroom_id' => $classroom_kimia_10->id,
            ]);
        $attendance = Attendance::factory()
            ->count(16)
            ->create([
                'presence_id' => $presence_kimia_10->id,
                'student_id' => $student_abcd->id,
            ]);
        $attendance = Attendance::factory()
            ->count(16)
            ->create([
                'presence_id' => $presence_biology_10->id,
                'student_id' => $student_efgh->id,
            ]);
    }
}
