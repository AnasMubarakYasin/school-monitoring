<?php

namespace App\Dynamic\Flow;

use App\Models\Administrator as ModelsAdministrator;
use App\Models\Classroom;
use App\Models\Employee;
use App\Models\Major;
use App\Models\MaterialAndAssignment;
use App\Models\Presence;
use App\Models\ScheduleOfSubjects;
use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subjects;

class Administrator extends Flow
{
    public int $minimum_requirement = 9;
    public function requirement()
    {
        $requirements = [
            'employee' => [
                'name' => 'input employees',
                'route' => route('web.administrator.users.employee.create'),
                'pass' => false,
            ],
            'school_year' => [
                'name' => 'input school year',
                'route' => route('web.administrator.data_master.school_information.create'),
                'pass' => false,
            ],
            'semester' => [
                'name' => 'input 2 semester',
                'route' => route('web.administrator.academic_data.semester.create'),
                'pass' => false,
            ],
            'major' => [
                'name' => 'input major',
                'route' => route('web.administrator.data_master.major.create'),
                'pass' => false,
            ],
            'subjects' => [
                'name' => 'input subjects',
                'route' => route('web.administrator.academic_data.subjects.create'),
                'pass' => false,
            ],
            'classroom' => [
                'name' => 'input classroom',
                'route' => route('web.administrator.data_master.classroom.create'),
                'pass' => false,
            ],
            'schedule_of_subjects' => [
                'name' => 'input schedule of subjects',
                'route' => route('web.administrator.academic_data.scheduleofsubjects.create'),
                'pass' => false,
            ],
            'student' => [
                'name' => 'input student',
                'route' => route('web.administrator.users.student.create'),
                'pass' => false,
            ],
            'presence' => [
                'name' => 'input presence',
                'route' => route('web.administrator.academic_data.presence.create'),
                'pass' => false,
            ],
            'material_and_assignment' => [
                'name' => 'input material and assignment',
                'route' => route('web.administrator.academic_data.materialandassignment.create'),
                'pass' => false,
            ],
            'academic_activity' => [
                'name' => 'input academic activity',
                'route' => route('web.administrator.academic_data.academic_activity.create'),
                'pass' => false,
            ],
        ];
        if (ModelsAdministrator::all()->count() > 1) {
        } else {
        }
        if (Employee::all()->count() == 0) {
            $requirements['employee']['pass'] = false;
        } else {
            $requirements['employee']['pass'] = true;
        }
        if (SchoolYear::all()->count() == 0) {
            $requirements['school_year']['pass'] = false;
        } else if (SchoolYear::all()->where('state', 'ongoing')->count() == 0) {
            // $requirements['school_year'] = [
            //     'name' => 'input school year or set field state to ongoing',
            //     'route' => route('web.administrator.data_master.school_information.list'),
            //     'pass' => false,
            // ];
        } else {
            $requirements['school_year']['pass'] = true;
        }
        if (Semester::all()->count() == 0) {
            $requirements['semester']['pass'] = false;
        } else if (Semester::all()->where('state', 'ongoing')->count() == 0) {
            $requirements['semester']['pass'] = false;
        } else {
            $requirements['semester']['pass'] = true;
        }
        if (Major::all()->count() == 0) {
            $requirements['major']['pass'] = false;
        } else {
            $requirements['major']['pass'] = true;
        }
        if (Subjects::all()->count() == 0) {
            $requirements['subjects']['pass'] = false;
        } else {
            $requirements['subjects']['pass'] = true;
        }
        if (Classroom::all()->count() == 0) {
            $requirements['classroom']['pass'] = false;
        } else {
            $requirements['classroom']['pass'] = true;
        }
        if (ScheduleOfSubjects::all()->count() == 0) {
            $requirements['schedule_of_subjects']['pass'] = false;
        } else {
            $requirements['schedule_of_subjects']['pass'] = true;
        }
        if (Student::all()->count() == 0) {
            $requirements['student']['pass'] = false;
        } else {
            $requirements['student']['pass'] = true;
        }
        if (Presence::all()->count() == 0) {
            $requirements['presence']['pass'] = false;
        } else {
            $requirements['presence']['pass'] = true;
        }
        if (MaterialAndAssignment::all()->count() == 0) {
            $requirements['material_and_assignment']['pass'] = false;
        } else {
            $requirements['material_and_assignment']['pass'] = true;
        }
        return $requirements;
    }
}
