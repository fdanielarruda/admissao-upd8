<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($representative) ? 'Editar Representante' : 'Cadastrar Representante' }}
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

                    <form method="POST" action="{{ isset($representative) ? route('representatives.update', $representative->id) : route('representatives.store') }}">
                        @csrf
                        @if (isset($representative))
                        @method('PUT')
                        @endif

                        <div class="md:flex md:space-x-4">
                            <div class="mb-4 w-full md:w-1/2">
                                <x-input-label for="cpf" value="CPF" />
                                <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf', $representative->cpf ?? '')" required autofocus maxlength="11" />
                                <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
                            </div>

                            <div class="mb-4 w-full md:w-1/2">
                                <x-input-label for="name" value="Nome" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $representative->name ?? '')" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('representatives.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 mr-4">
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
</x-app-layout>