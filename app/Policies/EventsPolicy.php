<?php

namespace App\Policies;

use App\User;
use Helper;
use Modules\Events\Entities\Event;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class EventsPolicy
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

    public function view(User $user, Event $events)
    {
        if(Helper::getPermission(Auth::user()->custom,Event::class,Auth::user()->role,'view') == true)
        {
            return true;
        }
    }

    /**
     * Determine whether the user can create events.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if(Helper::getPermission(Auth::user()->custom,Event::class,Auth::user()->role,'create') == true)
        {
            return true;
        }
    }

    /**
     * Determine whether the user can update the events.
     *
     * @param  \App\User  $user
     * @param  \App\Events  $events
     * @return mixed
     */
    public function update(User $user)
    {
        if(Helper::getPermission(Auth::user()->custom,Event::class,Auth::user()->role,'update') == true)
        {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the events.
     *
     * @param  \App\User  $user
     * @param  \App\Events  $events
     * @return mixed
     */
    public function delete(User $user)
    {
        if(Helper::getPermission(Auth::user()->custom,Event::class,Auth::user()->role,'delete') == true)
        {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the events.
     *
     * @param  \App\User  $user
     * @param  \App\Events  $events
     * @return mixed
     */
    public function restore(User $user, Events $events)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the events.
     *
     * @param  \App\User  $user
     * @param  \App\Events  $events
     * @return mixed
     */
    public function forceDelete(User $user, Events $events)
    {
        //
    }
}
