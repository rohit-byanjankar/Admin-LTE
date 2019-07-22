<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable=[
        'id','key','value'
    ];

    public function getPermissions()
    {
        return ["delete", "update", "create","view"];
    }
}
