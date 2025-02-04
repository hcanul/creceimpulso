<?php

namespace App\Scopes;

use App\Models\DatabaseConnection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CityDatabaseScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model)
    {
        $user = Auth::user();

        // Si el usuario es SuperAdmin o SuperUser, no aplica restricciones
        if ($user->hasRole(['SuperAdmin', 'SuperUser'])) {
            return;
        }

        // Obtener el city_id del usuario autenticado
        $cityId = $user->city_id;

        // Buscar en la tabla DatabaseConnection la conexión correspondiente
        $database = DatabaseConnection::where('city_id', $cityId)->first();

        if ($database) {
            // Configurar conexión dinámica
            config([
                'database.connections.dynamic_mysql.host' => env('APP_CONNECTION ') == 'remote' ? $database->db_host : $database->db_host_local,
                'database.connections.dynamic_mysql.database' => env('APP_CONNECTION ') == 'remote' ? $database->db_name : $database->db_name_local,
                'database.connections.dynamic_mysql.username' => env('APP_CONNECTION ') == 'remote' ? $database->db_username : $database->db_username_local,
                'database.connections.dynamic_mysql.password' => env('APP_CONNECTION ') == 'remote' ? $database->db_password : $database->db_password_local,
            ]);

            // Usar la conexión dinámica
            DB::purge('dynamic_mysql'); // Limpiar la caché de la conexión
            $builder->setConnection('dynamic_mysql');
        }

        // Filtrar registros por `city_id`
        $builder->where('city_id', $cityId);
    }
}
