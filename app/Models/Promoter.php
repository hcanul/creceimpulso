<?php

namespace App\Models;

use App\Scopes\CityDatabaseScope;
use Illuminate\Database\Eloquent\Model;

class Promoter extends Model
{
    protected $fillable = ['name','lastName','city_id', 'coordinator_id', 'phone'];

    protected static function booted()
    {
        static::addGlobalScope(new CityDatabaseScope);
    }

    public function city()
    {
        return $this->belongsTo(Cities::class)->select(['name']);
    }

    public function coordinator()
    {
        return $this->belongsTo(Coordinator::class)->select(['name']);
    }

    public function team()
    {
        return $this->hasMany(Team::class);
    }

    public function demand()
    {
        return $this->hasMany(Demand::class);
    }

    public function credit()
    {
        return $this->hasMany(Credit::class);
    }
}
