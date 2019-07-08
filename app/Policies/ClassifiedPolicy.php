<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;
use Helper;
use Modules\Classified\Entities\Classified;

class ClassifiedPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view(User $user, Classified $classified)
    {
        if($user->id == $classified->user_id && Helper::getPermission(Auth::user()->custom,Classified::class,Auth::user()->role,'view') == true)
        {
            return true;
        }
    }
  
    public function create(User $user)
    {
        if(Helper::getPermission(Auth::user()->custom,Classified::class,Auth::user()->role,'create') == true)
        {
            return true;
        }
    }

    public function update(User $user, Classified $classified)
    {
        
        if($user->id == $classified->user_id && Helper::getPermission(Auth::user()->custom,Classified::class,Auth::user()->role,'update') == true)
        {
            return true;
        }
    }

    public function delete(User $user, Classified $classified)
    {
        if($user->id == $classified->user_id && Helper::getPermission(Auth::user()->custom,Classified::class,Auth::user()->role,'delete') == true)
        {
            return true;
        }
    }
}
