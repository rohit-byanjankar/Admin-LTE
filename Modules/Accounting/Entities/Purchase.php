<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['biller','address','phone_number','pan_number','ledger_id',
        'invoice_no','date','taxable_amount','vat','total','updated_by'];

    public function ledger()
    {
        return $this->belongsTo(Ledger::class);
    }

    public function purchaseDetail()
    {
        return $this->hasMany(purchaseDetail::class);
    }
}
