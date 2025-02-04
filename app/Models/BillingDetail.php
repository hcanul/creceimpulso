<?php

namespace App\Models;

use App\Scopes\CityDatabaseScope;
use Illuminate\Database\Eloquent\Model;

class BillingDetail extends Model
{

    protected $fillable = ['charge_id', 'demand_id', 'credit_group_id', 'saldo', 'pago'];

    public function charge(){
        $this->belongsTo(Charge::class)->select(['pago']);
    }

}
