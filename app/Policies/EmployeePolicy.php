<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\Administrator;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    public function view_any(Administrator|Employee $user)
    {
        return true;
    }

    public function view(Administrator|Employee $user, Employee $schoolYear)
    {
        return true;
    }

    public function create(Administrator|Employee $user)
    {
        return true;
    }

    public function update(Administrator|Employee $user, Employee $schoolYear)
    {
        return true;
    }

    public function delete_any(Administrator|Employee $user)
    {
        return true;
    }

    public function delete(Administrator|Employee $user, Employee $schoolYear)
    {
        return true;
    }

    public function restore(Administrator|Employee $user, Employee $schoolYear)
    {
        return true;
    }

    public function forceDelete(Administrator|Employee $user, Employee $schoolYear)
    {
        return true;
    }
}
