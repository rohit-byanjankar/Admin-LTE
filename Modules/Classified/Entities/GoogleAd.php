<?php

namespace Modules\Classified\Entities;

use Illuminate\Database\Eloquent\Model;

class GoogleAd extends Model
{
    protected $fillable = ['code','description'];

    public function getPermissions()
    {
        return ["delete", "update", "create","view"];
    }
}
