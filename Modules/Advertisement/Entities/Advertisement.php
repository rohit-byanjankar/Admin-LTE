<?php

namespace Modules\Advertisement\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Advertisement extends Model
{
    protected $fillable = ['title', 'description', 'content', 'image','user_id','category_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(AdCategory::class);
    }
}
