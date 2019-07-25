<?php

namespace Modules\TelephoneDirectory\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class PhoneCategory extends Model implements Searchable
{
    //
    protected $fillable = ['name'];
    public $table = 'phone_category';

    public function phoneDirectory(){
        return $this->hasMany(PhoneDirectory::class);
    }

    public function getPermissions(){
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
