<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    
    public function view(User $user, Post $post)
    {
        //
    }

  
    public function create(User $user)
    {
        //
    }

  
    public function update(User $user, Post $post)
    {
        return $user->id == $post->user_id;
    }

   
    public function delete(User $user, Post $post)
    {
        return $user->id == $post->user_id;
    }
    

  
    public function restore(User $user, Post $post)
    {
        //
    }

  
    public function forceDelete(User $user, Post $post)
    {
        //
    }

    public function permission(User $user, Post $post)
    {
        return true;


    }
}
