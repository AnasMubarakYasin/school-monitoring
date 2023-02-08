<?php

namespace App\Policies;

use App\Models\ScheduleOfSubjects;
use App\Models\Administrator;
use App\Models\Employee;
use App\Models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class ScheduleOfSubjectsPolicy
{
    use HandlesAuthorization;

    public function view_any(Administrator|Employee|Student $user)
    {
        return true;
    }

    public function view(Administrator|Employee|Student $user, ScheduleOfSubjects $scheduleOfSubjects)
    {
        return true;
    }

    public function create(Administrator|Employee|Student $user)
    {
        return match ($user::class) {
            Employee::class => false,
            Student::class => false,
            default => true
        };
    }

    public function update(Administrator|Employee|Student $user, ScheduleOfSubjects $scheduleOfSubjects)
    {
        return match ($user::class) {
            Employee::class => false,
            Student::class => false,
            default => true
        };
    }

    public function delete_any(Administrator|Employee|Student $user)
    {
        return match ($user::class) {
            Employee::class => false,
            Student::class => false,
            default => true
        };
    }

    public function delete(Administrator|Employee|Student $user, ScheduleOfSubjects $scheduleOfSubjects)
    {
        return match ($user::class) {
            Employee::class => false,
            Student::class => false,
            default => true
        };
    }

    public function restore(Administrator|Employee|Student $user, ScheduleOfSubjects $scheduleOfSubjects)
    {
        return match ($user::class) {
            Employee::class => false,
            Student::class => false,
            default => true
        };
    }

    public function forceDelete(Administrator|Employee|Student $user, ScheduleOfSubjects $scheduleOfSubjects)
    {
        return match ($user::class) {
            Employee::class => false,
            ScheduleOfSubjects::class => false,
            default => true
        };
    }
}
