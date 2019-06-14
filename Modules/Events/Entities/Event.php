<?php

namespace Modules\Events\Entities;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'details', 'duration', 'published_at','venue','event_date'
    ];
}
