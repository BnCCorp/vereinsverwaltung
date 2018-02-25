<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinanceTransaction extends Model
{
    // many to one for transaction
    public function members()
    {
        return $this->belongsTo('App\Member');
    }

    // many to one for transaction
    public function finance_categories()
    {
        return $this->belongsTo('App\FinanceCategory');
    }

    // many to one for transaction
    public function finance_accounts()
    {
        return $this->belongsTo('App\FinanceAccount');
    }


    // many to many for transaction
    public function tags()
    {
        return $this->belongsToMany('App\FinanceTag')->withTimestamps();
    }
}
