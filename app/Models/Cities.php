<?php

namespace App\Models;

use App\Scopes\CityDatabaseScope;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $fillable = [ 'name' ];

    protected function name(): Attribute
    {
        return Attribute::make(
            set: function($value)
            {
                return strtoupper($value);
            },
            get: function($value)
            {
                return ucfirst($value);
            }
        );
    }

    //Todo: RelationShip

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function databaseconnection()
    {
        return $this->hasMany(DatabaseConnection::class);
    }
}
