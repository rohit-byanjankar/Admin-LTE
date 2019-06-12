<?php

namespace Modules\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name'];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function getPermissions()
    {
        return ["delete", "update", "create", "view"];
    }
}
