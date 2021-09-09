<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = ['distributor_name' ,
    'proprietor_name' ,
    'fat_hus_name' ,
    'proprietor_present_address' ,
    'proprietor_present_PO' ,
    'proprietor_present_thana' ,
    'proprietor_present_district' ,
    'proprietor_permanent_address' ,
    'proprietor_permanent_PO' ,
    'proprietor_permanent_thana' ,
    'proprietor_permanent_district',
    'telephone_office' ,
    'telephone_house' ,
    'mobile' ,
    'mobileALT' ,
    'fax' ,
    'zone' ,
    'division' ,
    'base' ,
    'image_distributot' ,
    'image_nominee' ,
    'image_trade' ,
    'image_nid' ,
    'image_form' ,
    'random_number' , 
    'comment',
    'distributor_payment',
    'total_money',
    'active']; 

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function paymentDistributor()
    {
        return $this->belongsTo(Payment::class)->withDefault();
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
    
}
