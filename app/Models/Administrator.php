<?php

namespace App\Models;

use App\Scopes\CityDatabaseScope;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $fillable = ['name','lastName','city_id','coordinator_id', 'phone'];

    protected static function booted()
    {
        static::addGlobalScope(new CityDatabaseScope);
    }

    public function coordinator()
    {
        return $this->belongsTo(Coordinator::class);
    }

    public function city()
    {
        return $this->belongsTo(Cities::class);
    }
}
