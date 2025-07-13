<?php

namespace App\Services;

use App\Models\City;
use App\Models\Client;

class ClientService
{
    public function listWithPaginate(?int $per_page = 10)
    {
        return Client::orderBy('name', 'asc')
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
        $client = Client::findOrFail($id);

        $ufs = City::select('uf')
            ->distinct()
            ->get()
            ->sortBy('uf');

        return [
            'client' => $client,
            'ufs' => $ufs
        ];
    }

    public function store(array $data)
    {
        return Client::create($data);
    }

    public function update(int $id, array $data)
    {
        $client = Client::findOrFail($id);
        $client->update($data);

        return $client;
    }

    public function delete(int $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
    }
}
