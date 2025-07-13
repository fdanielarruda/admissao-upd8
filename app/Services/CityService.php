<?php

namespace App\Services;

use App\Models\City;

class CityService
{
    public function listByUf(string $uf)
    {
        return City::where('uf', $uf)
            ->orderBy('name')
            ->get();
    }
}
