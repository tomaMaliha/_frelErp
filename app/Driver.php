<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['name' , 'email' , 'contact' , 'address' , 'join_date' , 'date_birth' , 'nid' , 'image' , 'status'];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
