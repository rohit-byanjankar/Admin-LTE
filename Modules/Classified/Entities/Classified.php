<?php

namespace Modules\Classified\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Classified extends Model
{
    protected $fillable = ['title', 'description', 'price', 'image','user_id','category_id'];
   
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classifiedCategory()
    {
        return $this->belongsTo(ClassifiedCategory::class);
    }
}
