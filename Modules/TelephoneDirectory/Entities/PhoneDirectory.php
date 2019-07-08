<?php

namespace Modules\TelephoneDirectory\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class PhoneDirectory extends Model implements Searchable
{
    public $table='phone_directory';
    // public $column='category_id';

    protected $fillable = ['first_name','middle_name','surname','city','street','home_number','mobile_number','office_number','profession','phone_category_id'];
    
    public function phoneCategory()
    {
        return $this->belongsTo(PhoneCategory::class);
    }

    public function getPermissions(){
        return ["delete", "update", "create", "view"];
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('telephonedir.show', $this->id);

        return new SearchResult(
            $this,
            $this->first_name,
            $url
         );
    }
}

