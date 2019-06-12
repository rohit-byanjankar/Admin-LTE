<?php

namespace Modules\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getPermissions(){
        return ["delete", "update", "create", "view"];
    }
}
