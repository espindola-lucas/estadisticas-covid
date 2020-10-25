<?php

namespace App\Policies;

use App\Models\CovidStatistic;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CovidStatisticPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CovidStatistic  $covidStatistic
     * @return mixed
     */
    public function view(User $user, CovidStatistic $covidStatistic)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role === 'manager';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CovidStatistic  $covidStatistic
     * @return mixed
     */
    public function update(User $user, CovidStatistic $covidStatistic)
    {
        return $user->id === $covidStatistic->user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CovidStatistic  $covidStatistic
     * @return mixed
     */
    public function delete(User $user, CovidStatistic $covidStatistic)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CovidStatistic  $covidStatistic
     * @return mixed
     */
    public function restore(User $user, CovidStatistic $covidStatistic)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CovidStatistic  $covidStatistic
     * @return mixed
     */
    public function forceDelete(User $user, CovidStatistic $covidStatistic)
    {
        return true;
    }
}
