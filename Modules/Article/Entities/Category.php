<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name','image'];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function getPermissions()
    {
        return ["delete", "update", "create", "view"];
    }
}
