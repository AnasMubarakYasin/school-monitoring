<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Classroom;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassroomPolicy
{
    use HandlesAuthorization;

    public function view_any(Administrator|Employee $user)
    {
        return true;
    }

    public function view(Administrator|Employee $user, Classroom $classroom)
    {
        return true;
    }

    public function create(Administrator|Employee $user)
    {
        return true;
    }

    public function update(Administrator|Employee $user, Classroom $classroom)
    {
        return true;
    }

    public function delete_any(Administrator|Employee $user)
    {
        return true;
    }

    public function delete(Administrator|Employee $user, Classroom $classroom)
    {
        return true;
    }

    public function restore(Administrator|Employee $user, Classroom $classroom)
    {
        return true;
    }

    public function forceDelete(Administrator|Employee $user, Classroom $classroom)
    {
        return true;
    }
}
