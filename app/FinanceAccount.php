<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinanceAccount extends Model
{
    protected $appends = ['amount'];

    // TODO sum the transaction amounts which match the account id
    public function getAmountAttribute()
    {
        return $this->startamount * 10;
    }
}