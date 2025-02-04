<?php

namespace Database\Seeders\Configuracion;

use App\Models\Cities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $cities = [
        'Carrillo',
        'Morelos',
        'Tulum',
        'Playa',
        'Playa2',
        'Cancun',
        'Cancun2'
    ];

    public function run(): void
    {

        foreach ($this->cities as $city) {
            Cities::create(['name'=>$city]);
        }
    }
}
