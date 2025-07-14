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
            ['name' => 'Guarulhos', 'uf' => 'SP'],
            ['name' => 'Campinas', 'uf' => 'SP'],
            ['name' => 'São Bernardo do Campo', 'uf' => 'SP'],
            ['name' => 'Santo André', 'uf' => 'SP'],
            ['name' => 'Osasco', 'uf' => 'SP'],
            ['name' => 'Ribeirão Preto', 'uf' => 'SP'],
            ['name' => 'Sorocaba', 'uf' => 'SP'],
            ['name' => 'São José dos Campos', 'uf' => 'SP'],
            ['name' => 'Santos', 'uf' => 'SP'],
            ['name' => 'Jundiaí', 'uf' => 'SP'],
            ['name' => 'Piracicaba', 'uf' => 'SP'],
            ['name' => 'Rio de Janeiro', 'uf' => 'RJ'],
            ['name' => 'São Gonçalo', 'uf' => 'RJ'],
            ['name' => 'Duque de Caxias', 'uf' => 'RJ'],
            ['name' => 'Nova Iguaçu', 'uf' => 'RJ'],
            ['name' => 'Niterói', 'uf' => 'RJ'],
            ['name' => 'Belford Roxo', 'uf' => 'RJ'],
            ['name' => 'Campos dos Goytacazes', 'uf' => 'RJ'],
            ['name' => 'Petrópolis', 'uf' => 'RJ'],
            ['name' => 'Volta Redonda', 'uf' => 'RJ'],
            ['name' => 'Belo Horizonte', 'uf' => 'MG'],
            ['name' => 'Uberlândia', 'uf' => 'MG'],
            ['name' => 'Contagem', 'uf' => 'MG'],
            ['name' => 'Juiz de Fora', 'uf' => 'MG'],
            ['name' => 'Montes Claros', 'uf' => 'MG'],
            ['name' => 'Uberaba', 'uf' => 'MG'],
            ['name' => 'Betim', 'uf' => 'MG'],
            ['name' => 'Ribeirão das Neves', 'uf' => 'MG'],
            ['name' => 'Vitória', 'uf' => 'ES'],
            ['name' => 'Vila Velha', 'uf' => 'ES'],
            ['name' => 'Serra', 'uf' => 'ES'],
            ['name' => 'Cariacica', 'uf' => 'ES'],

            ['name' => 'Curitiba', 'uf' => 'PR'],
            ['name' => 'Londrina', 'uf' => 'PR'],
            ['name' => 'Maringá', 'uf' => 'PR'],
            ['name' => 'Ponta Grossa', 'uf' => 'PR'],
            ['name' => 'Cascavel', 'uf' => 'PR'],
            ['name' => 'São José dos Pinhais', 'uf' => 'PR'],
            ['name' => 'Foz do Iguaçu', 'uf' => 'PR'],
            ['name' => 'Porto Alegre', 'uf' => 'RS'],
            ['name' => 'Caxias do Sul', 'uf' => 'RS'],
            ['name' => 'Canoas', 'uf' => 'RS'],
            ['name' => 'Pelotas', 'uf' => 'RS'],
            ['name' => 'Santa Maria', 'uf' => 'RS'],
            ['name' => 'Gravataí', 'uf' => 'RS'],
            ['name' => 'Viamão', 'uf' => 'RS'],
            ['name' => 'Florianópolis', 'uf' => 'SC'],
            ['name' => 'Joinville', 'uf' => 'SC'],
            ['name' => 'Blumenau', 'uf' => 'SC'],
            ['name' => 'São José', 'uf' => 'SC'],
            ['name' => 'Criciúma', 'uf' => 'SC'],
            ['name' => 'Itajaí', 'uf' => 'SC'],

            ['name' => 'Salvador', 'uf' => 'BA'],
            ['name' => 'Feira de Santana', 'uf' => 'BA'],
            ['name' => 'Vitória da Conquista', 'uf' => 'BA'],
            ['name' => 'Camaçari', 'uf' => 'BA'],
            ['name' => 'Juazeiro', 'uf' => 'BA'],
            ['name' => 'Ilhéus', 'uf' => 'BA'],
            ['name' => 'Fortaleza', 'uf' => 'CE'],
            ['name' => 'Caucaia', 'uf' => 'CE'],
            ['name' => 'Juazeiro do Norte', 'uf' => 'CE'],
            ['name' => 'Sobral', 'uf' => 'CE'],
            ['name' => 'Recife', 'uf' => 'PE'],
            ['name' => 'Jaboatão dos Guararapes', 'uf' => 'PE'],
            ['name' => 'Olinda', 'uf' => 'PE'],
            ['name' => 'Caruaru', 'uf' => 'PE'],
            ['name' => 'Petrolina', 'uf' => 'PE'],
            ['name' => 'Maceió', 'uf' => 'AL'],
            ['name' => 'Arapiraca', 'uf' => 'AL'],
            ['name' => 'João Pessoa', 'uf' => 'PB'],
            ['name' => 'Campina Grande', 'uf' => 'PB'],
            ['name' => 'Natal', 'uf' => 'RN'],
            ['name' => 'Mossoró', 'uf' => 'RN'],
            ['name' => 'Aracaju', 'uf' => 'SE'],
            ['name' => 'Nossa Senhora do Socorro', 'uf' => 'SE'],
            ['name' => 'Teresina', 'uf' => 'PI'],
            ['name' => 'Parnaíba', 'uf' => 'PI'],
            ['name' => 'São Luís', 'uf' => 'MA'],
            ['name' => 'Imperatriz', 'uf' => 'MA'],

            ['name' => 'Manaus', 'uf' => 'AM'],
            ['name' => 'Parintins', 'uf' => 'AM'],
            ['name' => 'Belém', 'uf' => 'PA'],
            ['name' => 'Ananindeua', 'uf' => 'PA'],
            ['name' => 'Santarém', 'uf' => 'PA'],
            ['name' => 'Marabá', 'uf' => 'PA'],
            ['name' => 'Porto Velho', 'uf' => 'RO'],
            ['name' => 'Ji-Paraná', 'uf' => 'RO'],
            ['name' => 'Boa Vista', 'uf' => 'RR'],
            ['name' => 'Macapá', 'uf' => 'AP'],
            ['name' => 'Rio Branco', 'uf' => 'AC'],
            ['name' => 'Palmas', 'uf' => 'TO'],
            ['name' => 'Araguaína', 'uf' => 'TO'],

            ['name' => 'Brasília', 'uf' => 'DF'],
            ['name' => 'Goiânia', 'uf' => 'GO'],
            ['name' => 'Aparecida de Goiânia', 'uf' => 'GO'],
            ['name' => 'Anápolis', 'uf' => 'GO'],
            ['name' => 'Rio Verde', 'uf' => 'GO'],
            ['name' => 'Cuiabá', 'uf' => 'MT'],
            ['name' => 'Várzea Grande', 'uf' => 'MT'],
            ['name' => 'Rondonópolis', 'uf' => 'MT'],
            ['name' => 'Campo Grande', 'uf' => 'MS'],
            ['name' => 'Dourados', 'uf' => 'MS'],
            ['name' => 'Três Lagoas', 'uf' => 'MS'],
        ];

        foreach ($cities as $cityData) {
            City::create($cityData);
        }
    }
}
