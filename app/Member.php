<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // one to many for transaction
    public function finance_transactions()
    {
        return $this->hasMany('App\FinanceTransaction');
    }
}
