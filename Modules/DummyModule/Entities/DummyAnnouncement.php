<?php

namespace Modules\DummyModule\Entities;

use Illuminate\Database\Eloquent\Model;

class DummyAnnouncement extends Model
{
    public $table = 'dummy_announcement';
    protected $fillable = ['title','details','published_at','published_till'];
}
