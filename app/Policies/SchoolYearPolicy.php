<?php

namespace App\Policies;

use App\Models\SchoolYear;
use App\Models\Administrator;
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
    public function view_any(Administrator $user)
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
    public function view(Administrator $user, SchoolYear $schoolYear)
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
     * @param  \App\Models\SchoolYear  $schoolYear
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Administrator $user, SchoolYear $schoolYear)
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
    public function delete_any(Administrator $user)
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
    public function delete(Administrator $user, SchoolYear $schoolYear)
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
    public function restore(Administrator $user, SchoolYear $schoolYear)
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
    public function forceDelete(Administrator $user, SchoolYear $schoolYear)
    {
        return true;
    }
}
