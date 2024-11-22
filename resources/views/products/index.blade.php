@extends('layouts.layout')
@section('tituloPagina', 'Products Index')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection

@section('contenido')

    @if (session('nuevo'))
        @include('_alert', ['nuevo' => session('nuevo')])
    @endif

    <div class="flex justify-between mx-4 mt-4 items-center">
        <h1 class="text-2xl font-bold mb-4">Listado de Productos</h1>

        <div class="flex space-x-4 items-center">
            <!-- Barra de búsqueda -->
            <input type="text" id="search-bar" placeholder="Buscar productos..."
                class="border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none" />

            <!-- Botón Nuevo Producto -->
            <a href='{{ route('products.create') }}'
                class="bg-blue-700 text-white px-4 py-3 rounded-lg inline-block hover:bg-blue-500">
                <i class="fa-solid fa-circle-plus fa-lg"></i> Nuevo Producto
            </a>
        </div>
    </div>

    {{-- Contenedor de la tabla --}}
    <div class="mx-4 mt-4">
        {{-- DataTable --}}
        <table id="products" class="shadow-lg rounded-lg overflow-hidden  table-auto w-full table-striped">
            <thead>
                <tr class="bg-cyan-200">
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">ID</th>
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">Nombre</th>
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">Imagen</th>
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">Descripción</th>
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">Precio</th>
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">Editar</th>
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">Eliminar</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($product as $item)
                    <tr class="">

                        {{-- ID --}}
                        <td class="py-2 px-4 border">{{ $item->id }}</td>

                        {{-- NAME --}}
                        <td class="py-2 px-4 border">{{ $item->name }}</td>

                        {{-- IMG --}}
                        <td class="py-2 px-4 border">
                            @if ($item->image_url)
                                <img src="{{ asset($item->image_url) }}" alt="Imagen del Producto">
                            @else
                                Sin Imagen
                            @endif
                        </td>

                        {{-- DESCRIPTION --}}
                        <td class="p-2  border relative group">
                            <span class="truncate block w-48">
                                {{ $item->short_description }}
                            </span>
                            <!-- Tooltip con la descripción completa -->
                            <div
                                class="absolute hidden group-hover:block bg-white border border-gray-400 shadow-lg p-2 rounded w-64 z-10">
                                {{ $item->description }}
                            </div>
                        </td>

                        {{-- PRICE --}}
                        <td class="py-2 px-4 border">{{ $item->price }}</td>

                        {{-- <td class="py-2 px-4 border">{{ $item->brand }}</td>
                    <td class="py-2 px-4 border">{{ $item->type }}</td>
                    <td class="py-2 px-4 border">{{ $item->stock }}</td>
                    <td class="py-2 px-4 border">{{ $item->state }}</td> --}}

                        {{-- EDIT --}}
                        <td class="py-2 px-4 border text-center">
                            <form action="{{ route('products.edit', $item->id) }}" method="GET">
                                <button class="bg-yellow-500 px-3 py-2 rounded hover:bg-yellow-300"><i
                                        class="fa-solid fa-user-pen"></i></button>
                            </form>
                        </td>

                        {{-- DELETE --}}
                        <td class="py-2 px-4 border text-center">
                            <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    onclick="return confirm('¿Desea eliminar permanentemente este registro?')"
                                    class="bg-red-500 px-3 py-2 rounded  hover:bg-red-300"><i
                                        class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="4" align="center">No hay registros</td>
                    </tr>
                @endforelse
                
            </tbody>
        </table>
    </div>


    {{-- datatable --}}
    @section('js')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                let tabla = $('#products').DataTable({
                    language: {
                        url: "//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json",
                    },
                    dom: 'rt<"flex justify-center items-center mt-4"p>',
                    pageLength: 5, // Cantidad de registros por página
                    drawCallback: function() {
                        // Clases de la paginación
                        $('ul.pagination').addClass('flex justify-center space-x-2');
                        $('ul.pagination li');
                        $('ul.pagination li.active');
                        $('ul.pagination li.disabled').addClass('opacity-50 cursor-not-allowed');
                    },
                });

                // Agregar funcionalidad a la barra de búsqueda personalizada
                $('#search-bar').on('keyup', function() {
                    tabla.search(this.value).draw();
                });
            });
        </script>
    @endsection

@endsection
