<?php

namespace Modules\Events\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Event extends Model implements Searchable
{
    //protected $connection='mysql2';
    protected $fillable = [
        'title', 'details', 'duration', 'published_at','venue','event_date','image','description'
    ];

    public function getPermissions(){
        return ["delete", "update", "create", "view"];
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('userevents.show', $this->id);

        return new SearchResult(
            $this->image,
            $this->title,
            $this->venue,
            $url
         );
    }
}
