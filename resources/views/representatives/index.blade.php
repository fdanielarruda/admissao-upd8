<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Representantes
                        </h2>
                        <a href="{{ route('representatives.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Adicionar Representante
                        </a>
                    </div>

                    @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm border">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Representante</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CPF</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cidades Atendidas</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($representatives as $representative)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $representative->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $representative->cpf }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        @php
                                        $citiesCount = $representative->cities->count();
                                        $displayedCities = $representative->cities->sortBy('name')->take(3);
                                        @endphp

                                        @forelse ($displayedCities as $city)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-2 mb-1">
                                            {{ $city->name }}
                                        </span>
                                        @empty
                                        Nenhuma cidade associada.
                                        @endforelse

                                        @if ($citiesCount > 3)
                                        <a href="{{ route('representatives.cities.edit', $representative->id) }}" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-200 text-gray-800 hover:bg-gray-300 transition-colors duration-200">
                                            + {{ $citiesCount - 3 }}
                                        </a>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('representatives.edit', $representative->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Editar</a>
                                        <a href="{{ route('representatives.cities.edit', $representative->id) }}" class="text-green-600 hover:text-green-900 mr-4">Cidades</a>
                                        <form action="{{ route('representatives.destroy', $representative->id) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este representante?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Nenhum representante encontrado.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $representatives->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>