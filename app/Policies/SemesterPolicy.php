<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SemesterPolicy
{
    use HandlesAuthorization;

    public function view_any(Administrator $user)
    {
        return true;
    }

    public function view(Administrator $user, Semester $schoolYear)
    {
        return true;
    }

    public function create(Administrator $user)
    {
        return true;
    }

    public function update(Administrator $user, Semester $schoolYear)
    {
        return true;
    }

    public function delete_any(Administrator $user)
    {
        return true;
    }

    public function delete(Administrator $user, Semester $schoolYear)
    {
        return true;
    }

    public function restore(Administrator $user, Semester $schoolYear)
    {
        return true;
    }

    public function forceDelete(Administrator $user, Semester $schoolYear)
    {
        return true;
    }
}