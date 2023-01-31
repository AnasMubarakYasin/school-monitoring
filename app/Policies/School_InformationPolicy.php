<?php

namespace App\Policies;

use App\Models\School_Information;
use App\Models\Administrator;
use Illuminate\Auth\Access\HandlesAuthorization;

class School_InformationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Administrator  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Administrator $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\School_Information  $school_information
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Administrator $user, School_Information $school_information)
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
     * @param  \App\Models\School_Information  $school_information
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Administrator $user, School_Information $school_information)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\School_Information  $school_information
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Administrator $user, School_Information $school_information)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\School_Information  $school_information
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Administrator $user, School_Information $school_information)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\School_Information  $school_information
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Administrator $user, School_Information $school_information)
    {
        return true;
    }
}
