<?php

namespace App\Policies;

use App\User;
use Modules\TelephoneDirectory\Entities\PhoneDirectory;
use Illuminate\Auth\Access\HandlesAuthorization;
use Helper;
use Auth;

class PhoneDirectoriesPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any directory.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the directory.
     *
     * @param  \App\User  $user
     * @param  \App\PhoneDirectory $phoneDirectory
     * @return mixed
     */
    public function view(User $user)
    {
        //
    }

    /**
     * Determine whether the user can create events.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if(Helper::getPermission(Auth::user()->custom,PhoneDirectory::class,Auth::user()->role,'create') == true)
        {
            return true;
        }
    }

    /**
     * Determine whether the user can update the directory.
     *
     * @param  \App\User  $user
     * @param  \App\PhoneDirectory $phoneDirectory
     * @return mixed
     */
    public function update(User $user)
    {
        if(Helper::getPermission(Auth::user()->custom,PhoneDirectory::class,Auth::user()->role,'update') == true)
        {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the directory.
     *
     * @param  \App\User  $user
     * @param  \App\PhoneDirectory $phoneDirectory
     * @return mixed
     */
    public function delete(User $user)
    {
        if(Helper::getPermission(Auth::user()->custom,PhoneDirectory::class,Auth::user()->role,'delete') == true)
        {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the directory.
     *
     * @param  \App\User  $user
     * @param  \App\PhoneDirectory $phoneDirectory
     * @return mixed
     */
    public function restore(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the directory.
     *
     * @param  \App\User  $user
     * @param  \App\PhoneDirectory $phoneDirectory
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        //
    }
}
