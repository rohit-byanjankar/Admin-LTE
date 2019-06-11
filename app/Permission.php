<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'role', 'permission_granted', 'model'
    ];

     public function getPermissions()
    {
        return ["delete", "update", "create", "insert", "view"];
    }

    public function setPermissions()
    {
       
    }

    
}
