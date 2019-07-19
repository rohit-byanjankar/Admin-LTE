<?php

namespace App\Policies;

use App\User;
use Helper;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Classified\Entities\GoogleAd;
use Auth;

class GoogleAdPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function create(User $user)
    {
        if(Helper::getPermission(Auth::user()->custom,GoogleAd::class,Auth::user()->role,'create') == true)
        {
            return true;
        }
    }

    public function update(User $user)
    {
        if(Helper::getPermission(Auth::user()->custom,GoogleAd::class,Auth::user()->role,'update') == true)
        {
            return true;
        }
    }

    public function delete(User $user)
    {
        if(Helper::getPermission(Auth::user()->custom,GoogleAd::class,Auth::user()->role,'delete') == true)
        {
            return true;
        }
    }

    public function view(User $user)
    {
        if( Helper::getPermission(Auth::user()->custom,GoogleAd::class,Auth::user()->role,'view') == true)
        {
            return true;
        }
    }
}
