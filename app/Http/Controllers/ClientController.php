<?php

namespace App\Http\Controllers;

use App\Http\Requests\Clients\ClientStoreRequest;
use App\Http\Requests\Clients\ClientUpdateRequest;
use App\Services\ClientService;
use App\Models\City;

class ClientController
{
    public function __construct(
        protected ClientService $service
    ) {}

    public function index()
    {
        $per_page = request()->query('per_page', 10);

        $filters = request()->only(['name', 'cpf', 'birthdate', 'gender', 'uf', 'city_id']);

        $clients = $this->service->listWithPaginate($per_page, $filters);

        $ufs = City::select('uf')
            ->distinct()
            ->orderBy('uf')
            ->get();

        $cities = collect();
        if (isset($filters['uf']) && $filters['uf']) {
            $cities = City::where('uf', $filters['uf'])
                ->orderBy('name')
                ->get();
        }

        return view('clients.index', [
            'clients' => $clients,
            'ufs' => $ufs,
            'cities' => $cities,
        ]);
    }

    public function create()
    {
        $data = $this->service->prepareForCreate();

        return view('clients.create', $data);
    }

    public function store(ClientStoreRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()->route('clients.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function edit(int $id)
    {
        $data = $this->service->prepareForUpdate($id);

        return view('clients.create', $data);
    }

    public function update(ClientUpdateRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());

        return redirect()->route('clients.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return redirect()->route('clients.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
