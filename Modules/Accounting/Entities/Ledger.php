<?php

namespace Modules\Accounting\Entities;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $table='ledger';
    protected $fillable = ['ledger_code','ledger_name','type'];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function sales()
    {
        return $this->hasMany(Sales::class);
    }
}
