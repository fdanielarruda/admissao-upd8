<?php

namespace App\Services;

use App\Models\City;
use App\Models\Representative;

class RepresentativeService
{
    public function listWithPaginate(?int $per_page = 10)
    {
        return Representative::with('cities')
            ->orderBy('name', 'asc')
            ->paginate($per_page);
    }

    public function prepareForCreate()
    {
        $ufs = City::select('uf')
            ->distinct()
            ->get()
            ->sortBy('uf');

        return [
            'ufs' => $ufs
        ];
    }

    public function prepareForUpdate(int $id)
    {
        $representative = Representative::findOrFail($id);

        $ufs = City::select('uf')
            ->distinct()
            ->get()
            ->sortBy('uf');

        return [
            'representative' => $representative,
            'ufs' => $ufs
        ];
    }

    public function prepareForCityManagement(int $id, ?string $uf = null)
    {
        $representative = Representative::with('cities')->findOrFail($id);

        $ufs = City::select('uf')
            ->distinct()
            ->get()
            ->sortBy('uf');

        $cities = collect();

        if ($uf) {
            $cities = City::where('uf', $uf)->orderBy('name')->get();
        }

        return [
            'representative' => $representative,
            'ufs' => $ufs,
            'cities' => $cities,
            'selectedUf' => $uf
        ];
    }

    public function store(array $data)
    {
        return Representative::create($data);
    }

    public function update(int $id, array $data)
    {
        $representative = Representative::findOrFail($id);
        $representative->update($data);

        return $representative;
    }

    public function delete(int $id)
    {
        $representative = Representative::findOrFail($id);
        $representative->delete();
    }

    public function addCity(int $id, int $city_id)
    {
        $representative = Representative::findOrFail($id);

        if (!$representative->cities->contains($city_id)) {
            $representative->cities()->attach($city_id);
        }
    }

    public function detachCity(int $id, int $city_id)
    {
        $representative = Representative::findOrFail($id);
        $representative->cities()->detach($city_id);
    }
}
