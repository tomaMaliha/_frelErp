<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
    'order_id' , 
    'product_id' , 
    'distributor_id' , 
    'quantity' , 
    'remarks' , 
    'ctn' , 
    'ctn_serial' , 
    'date' , 
    'DO' , 
    'value' , 
    'driver_name' , 
    'driver_mobile' ,
    'destination' , 
    'vehical' , 
    'transport' , 
    'note'];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
