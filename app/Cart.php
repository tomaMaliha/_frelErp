<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['distributor_id' , 'sub_category_id' ,'product_id' ,'quantity' ,'sub_total' , 'session_id'];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class)->withDefault();
    }

    public function category()
    {
        return $this->belongsTo(Category::class , 'sub_category_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
