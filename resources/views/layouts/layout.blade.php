<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- referenciar los archivos css --}}
    @yield('css')
    <script src="https://kit.fontawesome.com/f0d1b5e3e0.js" crossorigin="anonymous"></script>
    
    {{App::setLocale('es')}}
    <title>@yield('tituloPagina')</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite('resources/css/app.css')
    @vite('resources/css/datatable.css')
    @vite('resources/js/app.jsx')
</head>

{{-- Body antiguo --}}
{{-- <body class="flex flex-col min-h-screen"> --}}
{{-- <header class="bg-gray-800">
    <nav class="flex justify-between items-center w-[92%] mx-auto py-2">
        <div>
            <i class="cursor-pointer text-white fa-solid fa-shop fa-2xl"></i>
        </div>

        <div class="nav-links duration-500 md:static absolute bg-gray-800 md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                <li>
                    <a class="text-white hover:text-gray-500" href="#">Home</a>
                </li>
                <li>
                    <a class="text-white hover:text-gray-500" href="#">Products</a>
                </li>
                <li>
                    <a class="text-white hover:text-gray-500" href="#">Comming Soon</a>
                </li>
                <li>
                    <a class="text-white hover:text-gray-500" href="#">Comming Soon</a>
                </li>
            </ul>
        </div>

        <div class="flex items-center gap-6">
            <button class="bg-gray-700 text-white px-5 py-2 rounded-full hover:bg-gray-500">Sing In</button>
            <i onclick="onToggleMenu(this)" name="menu" class="cursor-pointer md:hidden fa-solid fa-bars fa-2xl "></i>
        </div>
    </nav>
</header> --}}

{{-- Div de contenido antiguo --}}
{{-- <div class="flex-grow container mx-auto p-5"> --}}


<body class="min-h-screen bg-gray-100">
    {{-- Barra de Navegación --}}
    @include('navigation')

    {{-- Contenido --}}
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @yield('contenido')

                </div>
            </div>
        </div>
    </div>

    {{-- Pie de Página --}}
    <footer class="bg-gray-800 text-white text-center py-4 mt-auto">
        @Labiaguerre
    </footer>

    @yield('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
