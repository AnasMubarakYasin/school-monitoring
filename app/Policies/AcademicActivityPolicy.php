<?php

namespace App\Policies;

use App\Models\AcademicActivity;
use App\Models\Administrator;
use App\Models\Employee;
use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AcademicActivityPolicy
{
    use HandlesAuthorization;

    public function view_any(Administrator|Employee|Student $user)
    {
        return true;
    }

    public function view(Administrator|Employee|Student $user, AcademicActivity $academic_activity)
    {
        return true;
    }

    public function create(Administrator|Employee|Student $user)
    {
        return match ($user::class) {
            Student::class => false,
            default => true
        };
    }

    public function update(Administrator|Employee|Student $user, AcademicActivity $academic_activity)
    {
        return match ($user::class) {
            Student::class => false,
            default => true
        };
    }

    public function delete_any(Administrator|Employee|Student $user)
    {
        return match ($user::class) {
            Student::class => false,
            default => true
        };
    }

    public function delete(Administrator|Employee|Student $user, AcademicActivity $academic_activity)
    {
        return match ($user::class) {
            Student::class => false,
            default => true
        };
    }

    public function restore(Administrator|Employee|Student $user, AcademicActivity $academic_activity)
    {
        return match ($user::class) {
            Student::class => false,
            default => true
        };
    }

    public function forceDelete(Administrator|Employee|Student $user, AcademicActivity $academic_activity)
    {
        return match ($user::class) {
            Student::class => false,
            default => true
        };
    }
}
