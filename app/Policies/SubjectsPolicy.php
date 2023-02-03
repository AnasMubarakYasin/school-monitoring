<?php

namespace App\Policies;

use App\Models\Subjects;
use App\Models\Administrator;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubjectsPolicy
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
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Administrator $user, Subjects $subjects)
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
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Administrator $user, Subjects $subjects)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Administrator $user, Subjects $subjects)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Administrator $user, Subjects $subjects)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Administrator  $user
     * @param  \App\Models\Subjects  $subjects
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Administrator $user, Subjects $subjects)
    {
        return true;
    }
}