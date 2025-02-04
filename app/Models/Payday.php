<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payday extends Model
{
    protected $fillable = ['credit_id', 'printedday', 'cicle'];
}
