<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $fillable = ['sub_category_id' , 'product_id' , 'date' , 'note' , 'stock' , 'pending_order' , 'alert_quantity' ];

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault();
    }

    public function category()
    {
        return $this->belongsTo(Category::class ,'sub_category_id')->withDefault();
    }
}
