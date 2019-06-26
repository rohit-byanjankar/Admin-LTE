<?php

namespace App\Policies;

use App\User;
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
    public function view(User $user, tag $tag)
    {
        if($user->id == $tag->user_id && Helper::getPermission(Auth::user()->custom,Tag::class,Auth::user()->role,'view') == true)
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
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the tag.
     *
     * @param  \App\User  $user
     * @param  \App\tag  $tag
     * @return mixed
     */
    public function update(User $user, tag $tag)
    {
        //
    }

    /**
     * Determine whether the user can delete the tag.
     *
     * @param  \App\User  $user
     * @param  \App\tag  $tag
     * @return mixed
     */
    public function delete(User $user, tag $tag)
    {
        //
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
