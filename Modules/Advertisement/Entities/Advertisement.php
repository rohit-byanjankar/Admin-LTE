<?php

namespace Modules\Advertisement\Entities;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = ['title', 'description', 'content', 'image'];
}
