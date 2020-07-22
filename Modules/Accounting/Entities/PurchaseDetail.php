<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class purchaseDetail extends Model
{
    protected $table='purchase_detail';
    protected $fillable = ['particular','quantity','rate','amount','purchase_id'];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
