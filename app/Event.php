<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'details', 'duration', 'published_at','venue','event_date'
    ];
}
