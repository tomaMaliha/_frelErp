<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Category extends Model
{
    // use SearchableTrait;

    protected $fillable = ['name' , 'sub_category' , 'description' ];

    // protected $searchable = [
    //     'columns' => [
    //         'categories.name' => 10,
    //     ],
    // ];

    public function parent()
    {
    	return $this->belongsTo(Category::class, 'sub_category');
    }

    public function products()
    {
        return $this->hasMany('App\Product','sub_category_id','id');
    }
}
