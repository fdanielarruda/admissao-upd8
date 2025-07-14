<?php

namespace App\Services;

use App\Models\City;
use App\Models\Client;
use Illuminate\Database\Eloquent\Builder;

class ClientService
{
    public function listWithPaginate(?int $per_page = 10, array $filters = [])
    {
        $query = Client::orderBy('name', 'asc');

        if (!empty($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if (!empty($filters['cpf'])) {
            $query->where('cpf', 'like', '%' . $filters['cpf'] . '%');
        }

        if (!empty($filters['birthdate'])) {
            $query->whereDate('birthdate', $filters['birthdate']);
        }

        if (!empty($filters['gender'])) {
            $query->where('gender', $filters['gender']);
        }

        if (!empty($filters['uf'])) {
            $query->whereHas('city', function (Builder $query) use ($filters) {
                $query->where('uf', $filters['uf']);
            });
        }

        if (!empty($filters['city_id'])) {
            $query->where('city_id', $filters['city_id']);
        }

        return $query->paginate($per_page)->withQueryString();
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
