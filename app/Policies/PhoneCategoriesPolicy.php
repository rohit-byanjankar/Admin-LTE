<?php

namespace App\Policies;

use App\User;
use Helper;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\TelephoneDirectory\Entities\PhoneCategory;

class PhoneCategoriesPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any events.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the events.
     *
     * @param  \App\User  $user
     * @param  \App\Events  $events
     * @return mixed
     */
    public function create(User $user)
    {
        if(Helper::getPermission(Auth::user()->custom,PhoneCategory::class,Auth::user()->role,'create') == true)
        {
            return true;
        }
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */


    /**
     * Determine whether the user can update the categories.
     *
     * @param  \App\User  $user
     * @param  \App\PhoneCategory  $phoneCategory
     * @return mixed
     */
    public function update(User $user)
    {
        if(Helper::getPermission(Auth::user()->custom,PhoneCategory::class,Auth::user()->role,'update') == true)
        {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the categories.
     *
     * @param  \App\User  $user
     * @param  \App\PhoneCategory  $phoneCategory
     * @return mixed
     */
    public function delete(User $user)
    {
        if(Helper::getPermission(Auth::user()->custom,PhoneCategory::class,Auth::user()->role,'delete') == true)
        {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the categories.
     *
     * @param  \App\User  $user
     * @param  \App\PhoneCategory  $phoneCategory
     * @return mixed
     */
    public function restore(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the categories.
     *
     * @param  \App\User  $user
     * @param  \App\PhoneCategory  $phoneCategory
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        //
    }
}
