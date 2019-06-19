<?php

namespace Modules\TelephoneDirectory\Entities;

use Illuminate\Database\Eloquent\Model;

class PhoneDirectory extends Model
{
    public $table='phone_directory';
    // public $column='category_id';

    protected $fillable = ['first_name','middle_name','surname','city','street','home_number','mobile_number','office_number','profession','phone_category_id'];
    
    public function phoneCategory()
    {
        return $this->belongsTo(PhoneCategory::class);
    }
}

