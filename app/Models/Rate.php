<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = ['name','cicle','Minamount','Maxamount','rate'];


    public function credit()
    {
        return $this->hasMany(Credit::class);
    }
}
