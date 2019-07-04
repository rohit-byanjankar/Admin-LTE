<?php

namespace Modules\Classified\Entities;

use Illuminate\Database\Eloquent\Model;

class ClassifiedCategory extends Model
{
    
    protected $fillable = ['name','image'];
    protected $table = 'adcategories';
    
    public function classifieds(){
        return $this->hasMany(Classified::class,'category_id');
    }
}
