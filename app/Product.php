<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    protected $fillable = ['category_id','sub_category_id' , 'name' , 'brand_id' , 'distributor_price' , 'trade_price' , 'corporate_price' , 'product_code' , 'bar_code' , 'image' , 'description' , 'unique_id'];

    public function category()
    {
        return $this->belongsTo(Category::class , 'sub_category_id')->withDefault();
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class)->withDefault();
    }

    public function stock()
    {
        return $this->hasOne('App\Stock')->withDefault();
    }

    public function order()
    {
        return $this->hasMany('App\OrderDetails');
    }
}
