<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinanceCategory extends Model
{
    // one to many for transaction
    public function finance_transactions()
    {
        return $this->hasMany('App\FinanceTransaction');
    }
}
