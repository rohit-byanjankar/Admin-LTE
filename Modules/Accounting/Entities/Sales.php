<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = ['customer','address','phone_number','pan_number','ledger_id'];

    public function ledger()
    {
        return $this->belongsTo(Ledger::class);
    }
}
