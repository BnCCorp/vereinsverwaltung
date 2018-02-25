<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinanceTag extends Model
{
    // many to many for transaction
    public function finance_transactions()
    {
        return $this->belongsToMany('App\FinanceTransaction')->withTimestamps();
    }
}
