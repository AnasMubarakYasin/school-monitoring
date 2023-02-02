<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassroomPolicy
{
    use HandlesAuthorization;

    public function view_any(Administrator $user)
    {
        return true;
    }

    public function view(Administrator $user, Classroom $classroom)
    {
        return true;
    }

    public function create(Administrator $user)
    {
        return true;
    }

    public function update(Administrator $user, Classroom $classroom)
    {
        return true;
    }

    public function delete_any(Administrator $user)
    {
        return true;
    }

    public function delete(Administrator $user, Classroom $classroom)
    {
        return true;
    }

    public function restore(Administrator $user, Classroom $classroom)
    {
        return true;
    }

    public function forceDelete(Administrator $user, Classroom $classroom)
    {
        return true;
    }
}
