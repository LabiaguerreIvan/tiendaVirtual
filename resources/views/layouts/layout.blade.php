<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- referenciar los archivos css --}}
    @yield('css')
    <script src="https://kit.fontawesome.com/f0d1b5e3e0.js" crossorigin="anonymous"></script>
    <title>@yield('tituloPagina') </title>
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
{{-- bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] --}}
<body class="flex flex-col min-h-screen">
<header class="bg-gray-800">
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
</header>

<div class="flex-grow container mx-auto p-5">
    {{-- referenciar contenedor de contenido --}}
    @yield('contenido')
</div>

<footer class="bg-gray-800 text-white text-center py-4 mt-auto">
    @Labiaguerre
</footer>

<script>
    const navLinks = document.querySelector('.nav-links')
    function onToggleMenu(e){
        e.name = e.name === 'menu' ? 'close' : 'menu'
        navLinks.classList.toggle('top-[9%]')
    }
</script>
@yield('js')
</body>

</html>
