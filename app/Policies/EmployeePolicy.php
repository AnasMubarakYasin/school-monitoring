<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\Administrator;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    public function view_any(Administrator $user)
    {
        return true;
    }

    public function view(Administrator $user, Employee $schoolYear)
    {
        return true;
    }

    public function create(Administrator $user)
    {
        return true;
    }

    public function update(Administrator $user, Employee $schoolYear)
    {
        return true;
    }

    public function delete_any(Administrator $user)
    {
        return true;
    }

    public function delete(Administrator $user, Employee $schoolYear)
    {
        return true;
    }

    public function restore(Administrator $user, Employee $schoolYear)
    {
        return true;
    }

    public function forceDelete(Administrator $user, Employee $schoolYear)
    {
        return true;
    }
}
