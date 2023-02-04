<?php

namespace App\Policies;

use App\Models\SchoolYear;
use App\Models\Administrator;
use App\Models\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolYearPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Administrator  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view_any(Administrator|Employee $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\SchoolYear  $schoolYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Administrator|Employee $user, SchoolYear $schoolYear)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Administrator  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Administrator|Employee $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\SchoolYear  $schoolYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Administrator|Employee $user, SchoolYear $schoolYear)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\SchoolYear  $schoolYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete_any(Administrator|Employee $user)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\SchoolYear  $schoolYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Administrator|Employee $user, SchoolYear $schoolYear)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\SchoolYear  $schoolYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Administrator|Employee $user, SchoolYear $schoolYear)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\SchoolYear  $schoolYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Administrator|Employee $user, SchoolYear $schoolYear)
    {
        return true;
    }
}
