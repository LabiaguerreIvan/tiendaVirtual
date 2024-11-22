<nav class="border-b border-gray-100 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <div class="flex shrink-0 items-center">
                    <!-- Logo de la tienda -->
                    <img src="{{ asset('storage/tienda.png') }}" class="h-8" alt="Tienda Logo" />
                </div>

                <!-- Enlace al catálogo -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('products.catalog') }}"
                        class="inline-flex items-center border-b-2 px-1 pt-1 text-sm font-medium leading-5 transition duration-150 border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 focus:border-gray-300 focus:text-gray-700">
                        Catálogo
                    </a>
                </div>
            </div>

            <!-- Si el usuario está autenticado -->
            @auth
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('products.index') }}"
                        class="inline-flex items-center border-b-2 px-1 pt-1 text-sm font-medium leading-5 transition duration-150 ease-in-out focus:outline-none border-indigo-400 text-gray-900 focus:border-indigo-700">
                        Administración
                    </a>
                </div>
            @endauth

            <!-- Menú desplegable para usuario -->
            <div class="hidden sm:ms-6 sm:flex sm:items-center relative ms-3">
                <div class="relative">
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">
                        {{ Auth::user()->name }}
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownNavbarLink">
                            <li>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">
                                    Perfil
                                </a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="block w-full text-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    type="submit">Cerrar Sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menú móvil (responsive) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button
                    onClick="document.getElementById('navbar-dropdown').classList.toggle('hidden');"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                >
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path class="inline-flex" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Navbar responsive -->
    <div class="sm:hidden" id="navbar-dropdown" style="display: none;">
        <div class="space-y-1 pb-3 pt-2">
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                Perfil
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="block w-full text-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                    type="submit">Cerrar Sesión</button>
            </form>
        </div>
    </div>
</nav>
