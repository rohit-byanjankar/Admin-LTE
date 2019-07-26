<?php

namespace Modules\MeetingRoom\Entities;

use Illuminate\Database\Eloquent\Model;

class MeetingRoom extends Model
{
    protected $table='meeting_room';
    protected $fillable=['title','agenda','time'];
    public function getPermissions()
    {
        return ["delete", "update", "create","view"];
    }
}
