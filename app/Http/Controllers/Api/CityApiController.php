<?php

namespace App\Http\Controllers\Api;

use App\Services\CityService;

class CityApiController
{
    public function __construct(
        protected CityService $service
    ) {}

    public function getCitiesByUf(string $uf)
    {
        $cities = $this->service->listByUf($uf);

        return response()->json([
            'cities' => $cities
        ]);
    }
}