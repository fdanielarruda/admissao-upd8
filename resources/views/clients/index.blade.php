<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Clientes
                        </h2>
                        <a href="{{ route('clients.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Adicionar Cliente
                        </a>
                    </div>

                    @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                    @endif

                    <form action="{{ route('clients.index') }}" method="GET" class="mb-4 p-4 bg-gray-50 rounded-lg shadow-sm">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ request('name') }}">
                            </div>
                            <div>
                                <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                                <input type="text" name="cpf" id="cpf" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ request('cpf') }}">
                            </div>
                            <div>
                                <label for="birthdate" class="block text-sm font-medium text-gray-700">Data Nasc.</label>
                                <input type="date" name="birthdate" id="birthdate" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ request('birthdate') }}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Sexo</label>
                                <div class="mt-1 flex items-center space-x-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="gender" value="m" class="form-radio" {{ request('gender') == 'm' ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Masculino</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="gender" value="f" class="form-radio" {{ request('gender') == 'f' ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Feminino</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="gender" value="" class="form-radio" {{ !request('gender') ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">Todos</span>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <label for="uf" class="block text-sm font-medium text-gray-700">Estado</label>
                                <select name="uf" id="uf" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Selecione um Estado</option>
                                    @foreach($ufs as $uf)
                                    <option value="{{ $uf->uf }}" {{ request('uf') == $uf->uf ? 'selected' : '' }}>{{ $uf->uf }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="city_id" class="block text-sm font-medium text-gray-700">Cidade</label>
                                <select name="city_id" id="city_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">Selecione uma Cidade</option>
                                    @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ request('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end space-x-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Filtrar
                            </button>
                            <a href="{{ route('clients.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Limpar Filtros
                            </a>
                        </div>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm border">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CPF</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Nasc.</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cidade</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sexo</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($clients as $client)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $client->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $client->cpf }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $client->birthdate ? \Carbon\Carbon::parse($client->birthdate)->format('d/m/Y') : 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $client->city->uf ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $client->city->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if ($client->gender == 'm')
                                        Masculino
                                        @elseif ($client->gender == 'f')
                                        Feminino
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('clients.edit', $client->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Editar</a>
                                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Nenhum cliente encontrado.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $clients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ufSelect = document.getElementById('uf');
            const citySelect = document.getElementById('city_id');
            const initialCityId = citySelect.value;

            function loadCities(uf, selectedCity = null) {
                if (uf) {
                    fetch(`/api/cities-by-uf/${uf}`)
                        .then(response => response.json())
                        .then(data => {
                            citySelect.innerHTML = '<option value="">Selecione uma Cidade</option>';
                            data.cities.forEach(city => {
                                const option = document.createElement('option');
                                option.value = city.id;
                                option.textContent = city.name;
                                if (selectedCity && selectedCity == city.id) {
                                    option.selected = true;
                                }
                                citySelect.appendChild(option);
                            });
                        });
                } else {
                    citySelect.innerHTML = '<option value="">Selecione uma Cidade</option>';
                }
            }

            if (ufSelect.value) {
                loadCities(ufSelect.value, initialCityId);
            }

            ufSelect.addEventListener('change', function() {
                loadCities(this.value);
            });
        });
    </script>
</x-app-layout>