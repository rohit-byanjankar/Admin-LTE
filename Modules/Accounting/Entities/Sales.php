<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = ['customer','address','phone_number','pan_number','ledger_id',
        'invoice_no','date','taxable_amount','vat','total','updated_by'];

    public function ledger()
    {
        return $this->belongsTo(Ledger::class);
    }

    public function salesDetails()
    {
        return $this->hasMany(salesDetail::class);
    }
}
