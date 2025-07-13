<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64">
        <div class="flex items-center justify-center h-16 bg-white border-b border-gray-100 px-4">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>
        </div>

        <div class="flex-1 flex flex-col overflow-y-auto">
            <nav class="flex-1 px-2 py-4 bg-white">
                <a href="{{ route('dashboard') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 cursor-pointer">
                    Dashboard
                </a>

                <a href="{{ route('clients.index') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 cursor-pointer">
                    Clientes
                </a>

                <a href="{{ route('profile.edit') }}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 cursor-pointer">
                    Perfil
                </a>

                <form method="POST" action="{{ route('logout') }}" id="logout-form-desktop">
                    @csrf
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form-desktop').submit();"
                        class="block px-3 py-2 rounded-md text-base font-medium text-red-500 hover:text-red-600 hover:bg-gray-50 cursor-pointer">
                        Sair
                    </a>
                </form>
            </nav>
        </div>
    </div>
</div>