<?php

namespace Modules\TelephoneDirectory\Entities;

use Illuminate\Database\Eloquent\Model;

class PhoneDirectory extends Model
{
    public $table='phone_directory';
    protected $fillable = ['first_name','middle_name','surname','city','street','home_number','mobile_number','office_number','profession'];
}
