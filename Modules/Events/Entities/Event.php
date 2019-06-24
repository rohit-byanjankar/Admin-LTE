<?php

namespace Modules\Events\Entities;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //protected $connection='mysql2';
    protected $fillable = [
        'title', 'details', 'duration', 'published_at','venue','event_date'
    ];

    public function getPermissions(){
        return ["delete", "update", "create", "view"];
    }
}
