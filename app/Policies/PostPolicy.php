<?php

namespace App\Policies;

use App\User;
use Modules\Article\Entities\Post ;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\UserRoles\Entities\Permission;
use Auth;
use Helper;

class PostPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Post $post)    
    {
        if($user->id == $post->user_id && Helper::getPermission(Auth::user()->custom,Post::class,Auth::user()->role,'view') == true)
        {
            return true;
        }
    }
  
    public function create(User $user)
    {
        
    }

    public function update(User $user, Post $post)
    {
        if($user->id == $post->user_id && Helper::getPermission(Auth::user()->custom,Post::class,Auth::user()->role,'update') == true)
        {
            return true;
        }
    }

   
    public function delete(User $user, Post $post)
    {
        if($user->id == $post->user_id && Helper::getPermission(Auth::user()->custom,Post::class,Auth::user()->role,'delete') == true)
        {
            return true;
        }
    }
    

  
    public function restore(User $user, Post $post)
    {
        
    }

  
    public function forceDelete(User $user, Post $post)
    {
        
    }

   
}
