<?php

namespace App\Services;

use App\Models\City;
use App\Models\Representative;

class RepresentativeService
{
    public function listWithPaginate(?int $per_page = 10)
    {
        return Representative::orderBy('name', 'asc')
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
}
