<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class distributorBalance extends Model
{
    protected $fillbale = ['distributor_id' , 
    'order_id' , 
    'payment_id' , 
    'credit_limit' , 
    'eligible_balance' , 
    'hold_balance' , 
    'cart_value' , 
    'balance' , 
    'sales' , 
    'collection' , 
    'opening_balance'];

    public function distributorBalanceOrder()
    {
        return $this->belongsTo(Distributor::class);
    }
    
}
