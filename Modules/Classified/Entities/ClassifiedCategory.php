<?php

namespace Modules\Classified\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class ClassifiedCategory extends Model implements Searchable
{
    protected $fillable = ['name','image'];
    protected $table = 'adcategories';
    
    public function classifieds(){
        return $this->hasMany(Classified::class,'category_id');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('adcat', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
         );
    }

    public function getPermissions()
    {
        return ["delete", "update", "create","view"];
    }
}
