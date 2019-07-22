<?php

namespace Modules\Classified\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Classified extends Model implements Searchable
{
    protected $fillable = ['title', 'description', 'price', 'image','user_id','category_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classifiedCategory()
    {
        return $this->belongsTo(ClassifiedCategory::class);
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('classified.show', $this->id);

        return new SearchResult(
            $this->image,
            $this->title,
            $url
         );
    }

    public function getPermissions()
    {
        return ["delete", "update", "create","view"];
    }
}
