<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    protected $table = 'transantion_historys';

    protected $fillable = ['date' , 
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
    'user_id'];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class)->withDefault();
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class , 'bank_name')->withDefault();
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
