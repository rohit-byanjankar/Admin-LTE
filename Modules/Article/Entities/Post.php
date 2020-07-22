<?php

namespace Modules\Article\Entities;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Post extends Model implements Searchable
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'description', 'content', 'image', 'published_at','category_id','user_id','status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //checks if post has tag 
    //returns boolean
    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }

    public function getPermissions()
    {
        return ["delete", "update", "create","view"];
    }
    
    public function getSearchResult(): SearchResult
    {
        $url = route('userposts.show', $this->id);

        return new SearchResult(
            $this,
            $this->title,
            $url
         );
    }
} 
