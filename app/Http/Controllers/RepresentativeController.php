<?php

namespace App\Http\Controllers;

use App\Http\Requests\Representatives\RepresentativeStoreRequest;
use App\Http\Requests\Representatives\RepresentativeUpdateRequest;
use App\Services\RepresentativeService;

class RepresentativeController
{
    public function __construct(
        protected RepresentativeService $service
    ) {}

    public function index()
    {
        $per_page = request()->query('per_page', 10);

        $representatives = $this->service->listWithPaginate($per_page);

        return view('representatives.index', [
            'representatives' => $representatives
        ]);
    }

    public function create()
    {
        $data = $this->service->prepareForCreate();

        return view('representatives.create', $data);
    }

    public function store(RepresentativeStoreRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()->route('representatives.index')->with('success', 'Representante cadastrado com sucesso!');
    }

    public function edit(int $id)
    {
        $data = $this->service->prepareForUpdate($id);

        return view('representatives.create', $data);
    }

    public function update(RepresentativeUpdateRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());

        return redirect()->route('representatives.index')->with('success', 'Representante cadastrado com sucesso!');
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);

        return redirect()->route('representatives.index')->with('success', 'Representante excluído com sucesso!');
    }
}
