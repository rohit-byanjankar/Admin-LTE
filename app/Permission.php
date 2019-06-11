<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'role', 'permission_granted', 'model'
    ];

   
     public function hasPermission ($permission, $model, $role, $permissions)
     {
       in_array($permissions[$role][$model],$permission);
     } 



}
