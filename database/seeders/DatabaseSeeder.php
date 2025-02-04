<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Configuracion\CitySeeder;
use Database\Seeders\Configuracion\DatabaseConnectionSeeder;
use Database\Seeders\Configuracion\PermissionSeeder;
use Database\Seeders\Configuracion\RolePermissionSeeder;
use Database\Seeders\Configuracion\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(DatabaseConnectionSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RolePermissionSeeder::class);
    }
}
