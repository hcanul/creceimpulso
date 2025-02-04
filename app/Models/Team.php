<?php

namespace App\Models;

use App\Scopes\CityDatabaseScope;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['promoter_id','name','city_id'];

    protected static function booted()
    {
        static::addGlobalScope(new CityDatabaseScope);
    }

    public function city()
    {
        return $this->belongsTo(Cities::class)->select(['name']);
    }

    public function promoter()
    {
        return $this->belongsTo(Promoter::class)->select(['name']);
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
