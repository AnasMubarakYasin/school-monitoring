<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Administrator;
use App\Models\Employee;
use App\Models\SchoolYear;
use App\Models\Semester;
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
        Administrator::factory()->create([
            'name' => 'admin',
            'email' => 'admin@host.local',
            'password' => 'admin',
        ]);
        Employee::factory(30)->create();

        $school_year = SchoolYear::factory()->create([
            'name' => now()->year . "/" . now()->addYear()->year,
            'state' => 'ongoing',
            'start_at' => now(),
            'end_at' => now()->addYear(),
        ]);
        $semester_odd = Semester::factory()->create([
            'name' => $school_year->start_at->year . "-" . 'odd',
            'part' => 'odd',
            'state' => 'ongoing',
            'start_at' => $school_year->start_at,
            'end_at' => Carbon::parse($school_year->start_at)->addMonths(6),
            'school_year_id' => $school_year->id,
        ]);
        $semester_even = Semester::factory()->create([
            'name' => $school_year->end_at->year . "-" . 'even',
            'part' => 'even',
            'state' => 'planned',
            'start_at' => Carbon::parse($school_year->start_at)->addMonths(7),
            'end_at' => $school_year->end_at,
            'school_year_id' => $school_year->id,
        ]);
    }
}
