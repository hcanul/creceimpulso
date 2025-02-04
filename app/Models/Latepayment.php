<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Latepayment extends Model
{
    protected $fillable = ['group_id', 'credit_id', 'total'];

    public function credit()
    {
        return $this->belongsTo(Credit::class);
    }
}
