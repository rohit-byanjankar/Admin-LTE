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
    public function view()
    {
        if( Helper::getPermission(Auth::user()->custom,Classified::class,Auth::user()->role,'view') == true)
        {
            return true;
        }
    }
  
    public function create()
    {
        if(Helper::getPermission(Auth::user()->custom,Classified::class,Auth::user()->role,'create') == true)
        {
            return true;
        }
    }

    public function update()
    {
        if( Helper::getPermission(Auth::user()->custom,Classified::class,Auth::user()->role,'update') == true)
        {
            return true;
        }
    }

    public function delete()
    {
        if( Helper::getPermission(Auth::user()->custom,Classified::class,Auth::user()->role,'delete') == true)
        {
            return true;
        }
    }
}
