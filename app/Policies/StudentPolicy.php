<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Employee;
use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    public function view_any(Administrator|Employee $user)
    {
        return true;
    }

    public function view(Administrator|Employee $user, Student $student)
    {
        return true;
    }

    public function create(Administrator|Employee $user)
    {
        return match ($user::class) {
            Administrator::class => true,
            default => false,
        };
    }

    public function update(Administrator|Employee|Student $user, Student $student)
    {
        return match ($user::class) {
            Administrator::class => true,
            default => false,
        };
    }

    public function delete_any(Administrator|Employee $user)
    {
        return match ($user::class) {
            Administrator::class => true,
            default => false,
        };
    }

    public function delete(Administrator|Employee $user, Student $student)
    {
        return match ($user::class) {
            Administrator::class => true,
            default => false,
        };
    }

    public function restore(Administrator|Employee $user, Student $student)
    {
        return true;
    }

    public function forceDelete(Administrator|Employee $user, Student $student)
    {
        return true;
    }
}
