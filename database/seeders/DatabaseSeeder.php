<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Administrator;
use App\Models\Classroom;
use App\Models\Employee;
use App\Models\SchoolInformation;
use App\Models\Major;
use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\Student;
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
        $major_kimia = Major::factory()->create([
            'expertise' => 'kimia',
        ]);
        $major_biology = Major::factory()->create([
            'expertise' => 'biology',
        ]);
        $major_language = Major::factory()->create([
            'expertise' => 'language',
        ]);
        $classrooms = Classroom::factory()
            ->count(15)
            ->state(new Sequence(
                ['major_id' => $major_kimia->id],
                ['major_id' => $major_biology->id],
                ['major_id' => $major_language->id],
            ))->state(new Sequence(
                ...$employees->map(function ($item) {
                    return ['homeroom_id' => $item->id];
                })->toArray()
            ))->create();
        $students = Student::factory()
            ->count(90)
            ->state(new Sequence(
                ['major_id' => $major_kimia->id],
                ['major_id' => $major_biology->id],
            ))->state(new Sequence(
                ...$classrooms->map(function ($item) {
                    return ['classroom_id' => $item->id];
                })->toArray()
            ))->create();
    }
}
