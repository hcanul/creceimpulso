<?php

namespace Database\Seeders\Configuracion;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    protected $permisos = [
        //todo:Dashboard
        ['name'=>'Ver Bienvenida', 'guard_name'=>'web'],
        ['name'=>'Ver DashBoard', 'guard_name'=>'web'],

        //todo:Configuraciones
        ['name'=>'Ver Configuraciones', 'guard_name'=>'web'],
        ['name'=>'Ver Roles', 'guard_name'=>'web'],
        ['name'=>'Ver ListaRoles', 'guard_name'=>'web'],
        ['name'=>'Ver CrearRoles', 'guard_name'=>'web'],
        ['name'=>'Ver EditarRoles', 'guard_name'=>'web'],
        ['name'=>'Ver EliminarRoles', 'guard_name'=>'web'],
        ['name'=>'Ver AsignarPermisos', 'guard_name'=>'web'],
        ['name'=>'Ver ListaPermisos', 'guard_name'=>'web'],
        ['name'=>'Ver OpcionesPermisos', 'guard_name'=>'web'],
        ['name'=>'Ver Usuarios', 'guard_name'=>'web'],
        ['name'=>'Ver ListaUsuarios', 'guard_name'=>'web'],
        ['name'=>'Ver CrearUsuarios', 'guard_name'=>'web'],
        ['name'=>'Ver EditarUsuarios', 'guard_name'=>'web'],
        ['name'=>'Ver EliminarUsuarios', 'guard_name'=>'web'],
    ];

    public function run(): void
    {
        foreach ($this->permisos as $value) {
            Permission::create(['name' => $value['name'], 'guard_name' => $value['guard_name']]);
        }
    }
}
