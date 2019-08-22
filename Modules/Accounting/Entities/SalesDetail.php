<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class salesDetail extends Model
{
    protected $table='sales_detail';
    protected $fillable = ['particular','quantity','rate','amount','sales_id'];

    public function sales()
    {
        return $this->belongsTo(Sales::class);
    }
}
