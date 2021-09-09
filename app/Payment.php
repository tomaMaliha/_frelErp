<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['date' , 
    'order_id' , 
    'distributor_id' , 
    'bank_name' , 
    'payment_method' , 
    'transaction_id' , 
    'ref_no' , 
    'amount' , 
    'attachment' , 
    'remarks' ,
    'division' ,
    'zone' ,
    'base' , 
    'mobile',
    'user_id',
    'distributor_payment',
    'total_money'];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class)->withDefault();
    }

    public function orderss()
    {
        return $this->belongsTo(Order::class , 'distributor_id' , 'distributor_id')->withDefault();
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class , 'bank_name')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction_history()
    {
        return $this->belongsTo(TransactionHistory::class , 'distributor_id' , 'distributor_id')->withDefault();
    }
}
