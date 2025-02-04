<?php

namespace Database\Seeders\Configuracion;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {

        User::create([
            'name' => 'hugo paulino',
            'apaterno' => 'canul',
            'amaterno' => 'echazarreta',
            'email' => 'creceimp@creceimpulso.com',
            'password' => Hash::make('ha260182ha'),
            'profile' => 'SuperAdmin',
            'city_id' => null,
            'status' => 'activo'
        ]);

        User::create([
            'name' => 'Jaime Alberto',
            'apaterno' => 'Lopez',
            'amaterno' => 'Alonso',
            'email' => 'jaguila_10@hotmail.com',
            'password' => Hash::make('10titan10'),
            'profile' => 'SuperUser',
            'city_id' => null,
            'status' => 'activo'
        ]);

    }
}
