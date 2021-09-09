<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['name' , 
    'account_number' , 
    'concerned_person' , 
    'contact' , 
    'logo' , 
    'address'];

    public function payment()
    {
        return $this->hasMany(Payemnt::class);
    }
}
