<?php

namespace Modules\Advertisement\Entities;

use Illuminate\Database\Eloquent\Model;

class AdCategory extends Model
{
    
    protected $fillable = ['name','image'];
    protected $table = 'adcategories';
    
    public function advertisements(){
        return $this->hasMany(Advertisement::class);
    }
}
