<?php

namespace Modules\Classified\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Classified extends Model
{
    protected $fillable = ['title', 'description', 'content', 'image','user_id','category_id'];
    protected $table="advertisements";
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(ClassifiedCategory::class);
    }
}
