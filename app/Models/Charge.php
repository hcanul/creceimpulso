<?php

namespace App\Models;

use App\Scopes\CityDatabaseScope;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $fillable = ['credit_id','totReq','pagoTotal','numPago','saldo', 'transa' ];


    public function credit()
    {
        return $this->belongsTo(Credit::class);
    }

    public function demands()
    {
        return $this->hasMany(Demand::class);
    }

    public function billingDetail(){
        $this->hasMany(BillingDetail::class);
    }
}
