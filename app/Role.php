<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name' , 'description' ];

    public function permission()
    {
       return $this->hasOne(Permission::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
