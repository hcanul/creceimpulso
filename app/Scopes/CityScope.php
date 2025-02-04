<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class CityScope implements Scope
{
    /**
     * Aplica el scope global a la consulta.
     */
    public function apply(Builder $builder, Model $model)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Aplicar el filtro por city_id si no es SuperAdmin o SuperUser
            if (!in_array($user->profile, ['SuperAdmin', 'SuperUser'])) {
                $builder->where('city_id', $user->city_id);
            }

            // Verificar si el usuario tiene roles especiales
            if (!$user->hasRole(['SuperAdmin', 'SuperUser'])) {
                $builder->where('city_id', $user->city_id);
            }
        }
    }
}
