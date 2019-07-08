<?php

namespace Modules\Article\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Category extends Model implements Searchable
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

    public function getSearchResult(): SearchResult
    {
        $url = route('cat', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
         );
    }
}
