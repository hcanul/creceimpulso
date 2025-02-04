<?php

namespace App\Models;

use App\Scopes\CityDatabaseScope;
use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{
    protected $fillable = ['name','lastName','city_id', 'phone'];

    protected static function booted()
    {
        static::addGlobalScope(new CityDatabaseScope);
    }

    // Relaciones -> hasMany
    public function administrator()
    {
        return $this->hasMany(Administrator::class);
    }

    // Relaciones <- belongsTo
    public function city()
    {
        return $this->belongsTo(City::class)->select(['name']);
    }

    public function promoter()
    {
        return $this->hasMany(Promoter::class);
    }
}
