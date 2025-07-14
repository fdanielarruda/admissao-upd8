<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gerenciar Cidades de Atuação para {{ $representative->name }}
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

                    @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
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

                    <form method="POST" action="{{ route('representatives.cities.update', $representative->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4 w-full md:w-full">
                            <x-input-label for="uf" value="UF" />
                            <select id="uf" name="uf" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                <option value="">Selecione um Estado</option>
                                @foreach($ufs as $ufOption)
                                <option value="{{ $ufOption->uf }}" {{ (isset($selectedUf) && $ufOption->uf == $selectedUf) ? "selected" : "" }}>{{ $ufOption->uf }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('uf')" class="mt-2" />
                        </div>

                        <div class="mb-4 w-full md:w-full">
                            <x-input-label for="cities" value="Adicionar Cidades de Atuação" />
                            <select id="cities" name="city_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                @forelse($cities as $cityOption)
                                @if(!in_array($cityOption->id, $representative->cities->pluck('id')->toArray()))
                                <option value="{{ $cityOption->id }}">
                                    {{ $cityOption->name }}
                                </option>
                                @endif
                                @empty
                                <option value="">Selecione um Estado para carregar as cidades ou não há mais cidades para adicionar neste UF.</option>
                                @endforelse
                            </select>
                            <x-input-error :messages="$errors->get('city_id')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('representatives.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 mr-4">
                                Voltar
                            </a>

                            <x-primary-button>
                                Adicionar Cidade
                            </x-primary-button>
                        </div>
                    </form>

                    <div class="mt-6">
                        <h3 class="font-semibold text-lg text-gray-800 leading-tight mb-3">Cidades de Atuação Atuais</h3>

                        @if ($representative->cities->isEmpty())
                        <p class="text-gray-600">Este representante ainda não possui cidades de atuação cadastradas.</p>
                        @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 text-sm border">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">UF</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cidade</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($representative->cities->sortBy('name')->sortBy('uf') as $city)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $city->uf }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $city->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <form action="{{ route('representatives.cities.detach', [$representative->id, $city->id]) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja remover esta cidade de atuação?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Remover</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ufSelect = document.getElementById('uf');

            ufSelect.addEventListener('change', function() {
                const selectedUf = this.value;
                const currentUrl = new URL(window.location.href);

                if (selectedUf) {
                    currentUrl.searchParams.set('uf', selectedUf);
                } else {
                    currentUrl.searchParams.delete('uf');
                }

                window.location.href = currentUrl.toString();
            });
        });
    </script>
    @endpush
</x-app-layout>