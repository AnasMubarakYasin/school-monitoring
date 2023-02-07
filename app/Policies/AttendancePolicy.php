<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttendancePolicy
{
    use HandlesAuthorization;

    public function view_any(Administrator|Employee|Student $user)
    {
        return true;
    }

    public function view(Administrator|Employee|Student $user, Attendance $attendance)
    {
        return true;
    }

    public function create(Administrator|Employee|Student $user)
    {
        return true;
    }

    public function update(Administrator|Employee|Student $user, Attendance $attendance)
    {
        return true;
    }

    public function delete_any(Administrator|Employee|Student $user)
    {
        return true;
    }

    public function delete(Administrator|Employee|Student $user, Attendance $attendance)
    {
        return true;
    }

    public function restore(Administrator|Employee|Student $user, Attendance $attendance)
    {
        return true;
    }

    public function forceDelete(Administrator|Employee|Student $user, Attendance $attendance)
    {
        return true;
    }
}
