<?php

namespace App\Traits;

use App\Scopes\CityScope;
use Illuminate\Support\Facades\Auth;

trait HasCityScope
{
    /**
     * El evento "booted" aplica automáticamente el Global Scope.
     */
    protected static function bootHasCityScope()
    {
        static::addGlobalScope(new CityScope());
    }

    /**
     * Verificar si el usuario tiene permiso específico para ver todos los registros.
     */
    public static function userCanViewAll(): bool
    {
        if (Auth::check()) {
            return Auth::user()->hasPermissionTo('view all records');
        }

        return false;
    }
}
