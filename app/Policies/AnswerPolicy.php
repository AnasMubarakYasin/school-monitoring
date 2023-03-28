<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Answer;
use App\Models\Employee;
use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    public function view_any(Administrator|Employee|Student $user)
    {
        return true;
    }

    public function view(Administrator|Employee|Student $user, Answer $answer)
    {
        return true;
    }

    public function create(Administrator|Employee|Student $user)
    {
        return match ($user::class) {
            Employee::class => false,
            Student::class => true,
            default => true
        };
    }

    public function update(Administrator|Employee|Student $user, Answer $answer)
    {
        return true;
    }

    public function delete_any(Administrator|Employee|Student $user)
    {
        return true;
    }

    public function delete(Administrator|Employee|Student $user, Answer $answer)
    {
        return true;
    }

    public function restore(Administrator|Employee|Student $user, Answer $answer)
    {
        return true;
    }

    public function forceDelete(Administrator|Employee|Student $user, Answer $answer)
    {
        return true;
    }
}
