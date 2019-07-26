<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['biller','address','phone_number','pan_number','ledger_id'];

    public function ledger()
    {
        return $this->belongsTo(Ledger::class);
    }
}
