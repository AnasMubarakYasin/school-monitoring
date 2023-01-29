<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SemesterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Administrator  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view_any(Administrator $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Semester  $schoolYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Administrator $user, Semester $schoolYear)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Administrator  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Administrator $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Semester  $schoolYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Administrator $user, Semester $schoolYear)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Semester  $schoolYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete_any(Administrator $user)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Semester  $schoolYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Administrator $user, Semester $schoolYear)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Semester  $schoolYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Administrator $user, Semester $schoolYear)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Semester  $schoolYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Administrator $user, Semester $schoolYear)
    {
        return true;
    }
}
