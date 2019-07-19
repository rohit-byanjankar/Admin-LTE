<?php

namespace App\Policies;

use Modules\Classified\Entities\ClassifiedCategory;
use Helper;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ClassifiedCategoryPolicy
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
        if(Helper::getPermission(Auth::user()->custom,ClassifiedCategory::class,Auth::user()->role,'view') == true)
        {
            return true;
        }
    }

    public function create()
    {
        if(Helper::getPermission(Auth::user()->custom,ClassifiedCategory::class,Auth::user()->role,'create') == true)
        {
            return true;
        }
    }

    public function update()
    {
        if(Helper::getPermission(Auth::user()->custom,ClassifiedCategory::class,Auth::user()->role,'update') == true)
        {
            return true;
        }
    }

    public function delete()
    {
        if(Helper::getPermission(Auth::user()->custom,ClassifiedCategory::class,Auth::user()->role,'delete') == true)
        {
            return true;
        }
    }
}
