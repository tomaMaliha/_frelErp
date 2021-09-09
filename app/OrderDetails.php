<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = ['order_id' , 'sub_category_id' ,'product_id' , 'quantity' , 'sub_total' , 'unique_id'];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
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
        return $this->belongsTo(Order::class );
    }
}
