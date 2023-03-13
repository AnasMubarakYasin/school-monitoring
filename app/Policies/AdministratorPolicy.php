<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdministratorPolicy
{
    use HandlesAuthorization;

    public function view_any(Administrator|Employee $user)
    {
        return true;
    }

    public function view(Administrator|Employee $user, Administrator $administrator)
    {
        return true;
    }

    public function create(Administrator|Employee $user)
    {
        return true;
    }

    public function update(Administrator|Employee $user, Administrator $administrator)
    {
        return true;
    }

    public function delete_any(Administrator|Employee $user)
    {
        return true;
    }

    public function delete(Administrator|Employee $user, Administrator $administrator)
    {
        return true;
    }

    public function restore(Administrator|Employee $user, Administrator $administrator)
    {
        return true;
    }

    public function forceDelete(Administrator|Employee $user, Administrator $administrator)
    {
        return true;
    }
}
