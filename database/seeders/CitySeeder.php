<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'São Paulo', 'uf' => 'SP'],
            ['name' => 'Rio de Janeiro', 'uf' => 'RJ'],
            ['name' => 'Belo Horizonte', 'uf' => 'MG'],
            ['name' => 'Salvador', 'uf' => 'BA'],
            ['name' => 'Brasília', 'uf' => 'DF'],
            ['name' => 'Curitiba', 'uf' => 'PR'],
            ['name' => 'Fortaleza', 'uf' => 'CE'],
            ['name' => 'Recife', 'uf' => 'PE'],
            ['name' => 'Porto Alegre', 'uf' => 'RS'],
            ['name' => 'Manaus', 'uf' => 'AM'],
            ['name' => 'Florianópolis', 'uf' => 'SC'],
            ['name' => 'Vitória', 'uf' => 'ES'],
            ['name' => 'Goiânia', 'uf' => 'GO'],
            ['name' => 'Belém', 'uf' => 'PA'],
            ['name' => 'Cuiabá', 'uf' => 'MT'],
        ];

        foreach ($cities as $cityData) {
            City::create($cityData);
        }
    }
}
