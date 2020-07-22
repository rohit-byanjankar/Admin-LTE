<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrar extends Model
{
    //
    protected $table="clients";
    protected $connection="registrar";
    protected $fillable=['community_name','database_name','community_url','database_username','database_password'];
}
