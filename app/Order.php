<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_id' , 'distributor_id' ,'total' , 'status' , 'session_id' ];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class)->withDefault();
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class );
    }

    public function order()
    {
        return $this->hasMany(OrderDetails::class , 'order_id' , 'order_id');
    }

    public function balance()
    {
        return $this->belongsTo(distributorBalance::class , 'order_id' , 'order_id')->withDefault();
    }
}