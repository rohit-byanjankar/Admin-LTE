<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;
use Helper;
use Modules\Article\Entities\Tag;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any tags.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the tag.
     *
     * @param  \App\User  $user
     * @param  \App\tag  $tag
     * @return mixed
     */
    public function view()
    {
        if(Helper::getPermission(Auth::user()->custom,Tag::class,Auth::user()->role,'view') == true)
            {
                return true;
            }
    }

    /**
     * Determine whether the user can create tags.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create()
    {
        if(Helper::getPermission(Auth::user()->custom,Tag::class,Auth::user()->role,'create') == true)
            {
                return true;
            }
    }

    /**
     * Determine whether the user can update the tag.
     *
     * @param  \App\User  $user
     * @param  \App\tag  $tag
     * @return mixed
     */
    public function update()
    {
        if(Helper::getPermission(Auth::user()->custom,Tag::class,Auth::user()->role,'update') == true)
            {
                return true;
            }
    }

    /**
     * Determine whether the user can delete the tag.
     *
     * @param  \App\User  $user
     * @param  \App\tag  $tag
     * @return mixed
     */
    public function delete()
    {
        if(Helper::getPermission(Auth::user()->custom,Tag::class,Auth::user()->role,'delete') == true)
        {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the tag.
     *
     * @param  \App\User  $user
     * @param  \App\tag  $tag
     * @return mixed
     */
    public function restore(User $user, tag $tag)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the tag.
     *
     * @param  \App\User  $user
     * @param  \App\tag  $tag
     * @return mixed
     */
    public function forceDelete(User $user, tag $tag)
    {
        //
    }
}
