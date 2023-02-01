<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Major;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MajorPolicy
{
    use HandlesAuthorization;

    public function view_any(Administrator $user)
    {
        return true;
    }

    public function view(Administrator $user, Major $major)
    {
        return true;
    }

    public function create(Administrator $user)
    {
        return true;
    }

    public function update(Administrator $user, Major $major)
    {
        return true;
    }

    public function delete_any(Administrator $user)
    {
        return true;
    }

    public function delete(Administrator $user, Major $major)
    {
        return true;
    }

    public function restore(Administrator $user, Major $major)
    {
        return true;
    }

    public function forceDelete(Administrator $user, Major $major)
    {
        return true;
    }
}
