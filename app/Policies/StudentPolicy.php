<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    public function view_any(Administrator $user)
    {
        return true;
    }

    public function view(Administrator $user, Student $student)
    {
        return true;
    }

    public function create(Administrator $user)
    {
        return true;
    }

    public function update(Administrator $user, Student $student)
    {
        return true;
    }

    public function delete_any(Administrator $user)
    {
        return true;
    }

    public function delete(Administrator $user, Student $student)
    {
        return true;
    }

    public function restore(Administrator $user, Student $student)
    {
        return true;
    }

    public function forceDelete(Administrator $user, Student $student)
    {
        return true;
    }
}
