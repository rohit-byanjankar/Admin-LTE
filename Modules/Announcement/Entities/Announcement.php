<?php

namespace Modules\Announcement\Entities;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    public $table = 'announcements';
    protected $fillable = ['title','details','published_at','published_till'];
}
