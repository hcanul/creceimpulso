<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditGroup extends Model
{
    protected $fillable = ['credit_id', 'demand_id', 'diasAtraso', 'presAnt', 'preNvo', 'crePreApro', 'creAprob', 'status'];


    public function demand()
    {
        return $this->belongsTo(Demand::class)->select(['pNombre', 'sNombre','aPaterno','aMaterno']);
    }
}
