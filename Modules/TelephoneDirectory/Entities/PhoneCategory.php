<?php

namespace Modules\TelephoneDirectory\Entities;

use Illuminate\Database\Eloquent\Model;

class PhoneCategory extends Model
{
    //
    protected $fillable = ['name'];
    public $table = 'phone_category';

    public function phoneDirectory(){
        return $this->hasMany(PhoneDirectory::class);
    }

  
}
