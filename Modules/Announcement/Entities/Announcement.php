<?php

namespace Modules\Announcement\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class Announcement extends Model  implements Searchable

{
    public $table = 'announcements';
    protected $fillable = ['title','details','published_till'];

    public function getPermissions(){
        return ["delete", "update", "create", "view"];
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('userannouncements.show', $this->id);

        return new SearchResult(
            $this,
            $this->title,
            $url
         );
    }
}
