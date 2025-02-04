<?php

namespace Database\Seeders\Configuracion;

use App\Models\DatabaseConnection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DatabaseConnection::create([
            'office_name' => 'Carrillo',
            'city_id' => 1,
            'db_name' => 'creceimp_creceimpulso',
            'db_user' => 'creceimp_alcoholico',
            'db_password' => '!nbLm)TLZ4F5',
        ]);

        DatabaseConnection::create([
            'office_name' => 'Morelos',
            'city_id' => 2,
            'db_name' => 'creceimp_morelos',
            'db_user' => 'creceimp_morelos',
            'db_password' => 'E=$Ja^sl]svQ',
        ]);

        DatabaseConnection::create([
            'office_name' => 'Tulum',
            'city_id' => 3,
            'db_name' => 'creceimp_tulum',
            'db_user' => 'creceimp_tulum',
            'db_password' => '=ghQBbj9t?MM',
        ]);

        DatabaseConnection::create([
            'office_name' => 'Playa',
            'city_id' => 4,
            'db_name' => 'creceimp_playa',
            'db_user' => 'creceimp_playa',
            'db_password' => '~e3KO=BKG697',
        ]);

        DatabaseConnection::create([
            'office_name' => 'Playa2',
            'city_id' => 5,
            'db_name' => 'creceimp_playa2',
            'db_user' => 'creceimp_playa2',
            'db_password' => '99PNQQ5=!4[H',
        ]);

        DatabaseConnection::create([
            'office_name' => 'Cancun',
            'city_id' => 6,
            'db_name' => 'creceimp_cancun',
            'db_user' => 'creceimp_cancun',
            'db_password' => 'q*]-roiDZF!*',
        ]);

        DatabaseConnection::create([
            'office_name' => 'Cancun2',
            'city_id' => 7,
            'db_name' => 'creceimp_cancun2',
            'db_user' => 'creceimp_cancun',
            'db_password' => 'q*]-roiDZF!*',
        ]);
    }
}
