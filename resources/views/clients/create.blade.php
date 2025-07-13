<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($client) ? 'Editar Cliente' : 'Cadastrar Cliente' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Opa!</strong>
                        <span class="block sm:inline">Houve alguns problemas com seu preenchimento.</span>
                        <ul class="mt-3 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ isset($client) ? route('clients.update', $client->id) : route('clients.store') }}">
                        @csrf
                        @if (isset($client))
                        @method('PUT')
                        @endif

                        <div class="md:flex md:space-x-4">
                            <div class="mb-4 w-full md:w-1/2">
                                <x-input-label for="cpf" value="CPF" />
                                <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf', $client->cpf ?? '')" required autofocus maxlength="11" />
                                <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
                            </div>

                            <div class="mb-4 w-full md:w-1/2">
                                <x-input-label for="name" value="Nome" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $client->name ?? '')" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="birthdate" value="Data de Nascimento" />
                            <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate', isset($client->birthdate) ? \Carbon\Carbon::parse($client->birthdate)->format('Y-m-d') : '')" required />
                            <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="gender" value="Sexo" />
                            <select id="gender" name="gender" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                                <option value="">Selecione</option>
                                <option value="m" {{ old('gender', $client->gender ?? '') == 'm' ? 'selected' : '' }}>Masculino</option>
                                <option value="f" {{ old('gender', $client->gender ?? '') == 'f' ? 'selected' : '' }}>Feminino</option>
                            </select>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                        </div>

                        <div class="md:flex md:space-x-4">
                            <div class="mb-4 w-full md:w-1/2">
                                <x-input-label for="address" value="Endereço" />
                                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', $client->address ?? '')" required />
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>

                            <div class="mb-4 w-full md:w-1/4">
                                <x-input-label for="uf" value="UF" />
                                <select id="uf" name="uf" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                                    <option value="">Selecione um Estado</option>
                                    @foreach($ufs as $ufOption)
                                    <option value="{{ $ufOption->uf }}" {{ old('uf', $client->city->uf ?? '') == $ufOption->uf ? 'selected' : '' }}>{{ $ufOption->uf }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('uf')" class="mt-2" />
                            </div>

                            <div class="mb-4 w-full md:w-1/4">
                                <x-input-label for="city_id" value="Cidade" />
                                <select id="city_id" name="city_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                                    <option value="">Selecione uma Cidade</option>
                                    @if(isset($client) && $client->city)
                                    <option value="{{ $client->city->id }}" selected>{{ $client->city->name }}</option>
                                    @endif
                                </select>
                                <x-input-error :messages="$errors->get('city_id')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('clients.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 mr-4">
                                Voltar
                            </a>


                            <x-primary-button>
                                Salvar
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ufSelect = document.getElementById('uf');
            const citySelect = document.getElementById('city_id');

            function loadCities(uf, selectedCityId = null) {
                citySelect.innerHTML = '<option value="">Carregando Cidades...</option>';
                citySelect.disabled = true;

                if (uf) {
                    fetch(`/api/cities-by-uf/${uf}`)
                        .then(response => response.json())
                        .then(data => {
                            citySelect.innerHTML = '<option value="">Selecione uma Cidade</option>';
                            data.cities.forEach(city => {
                                const option = document.createElement('option');
                                option.value = city.id;
                                option.textContent = city.name;
                                citySelect.appendChild(option);
                            });
                            citySelect.disabled = false;

                            if (selectedCityId) {
                                citySelect.value = selectedCityId;
                            } else if ("{{ old('city_id') }}") {
                                citySelect.value = "{{ old('city_id') }}";
                            }
                        })
                        .catch(error => {
                            console.error('Erro ao carregar cidades:', error);
                            citySelect.innerHTML = '<option value="">Erro ao carregar cidades</option>';
                            citySelect.disabled = true;
                        });
                } else {
                    citySelect.innerHTML = '<option value="">Selecione uma Cidade</option>';
                    citySelect.disabled = false;
                }
            }

            ufSelect.addEventListener('change', function() {
                loadCities(this.value);
            });

            const initialUf = ufSelect.value;
            const initialCityId = "{{ $client->city_id ?? old('city_id') }}";
            if (initialUf) {
                loadCities(initialUf, initialCityId);
            }
        });
    </script>
    @endpush
</x-app-layout>