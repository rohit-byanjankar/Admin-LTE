<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;
use Helper;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Announcement\Entities\Announcement;

class AnnouncementPolicy
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

    public function view()
    {
        if(Helper::getPermission(Auth::user()->custom,announcement::class,Auth::user()->role,'view') == true)
        {
            return true;
        }
    }

    public function create()
    {
        if(Helper::getPermission(Auth::user()->custom,announcement::class,Auth::user()->role,'create') == true)
        {
            return true;
        }
    }

    public function update()
    {
        if(Helper::getPermission(Auth::user()->custom,announcement::class,Auth::user()->role,'update') == true)
        {
            return true;
        }
    }

    public function delete()
    {
        if(Helper::getPermission(Auth::user()->custom,announcement::class,Auth::user()->role,'delete') == true)
        {
            return true;
        }
    }
}
