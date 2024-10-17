@extends('layouts.layout')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection

@section('tituloPagina', 'Products Index')

@section('contenido')
    <div class="flex justify-between mx-4 mt-4">
        <h1 class="text-2xl font-bold mb-4">Products List Sistem</h1>

        <a href='{{ route('products.create') }}'
            class="bg-blue-700 text-white px-4 py-3 rounded-lg inline-block hover:bg-blue-500"><i
                class="fa-solid fa-circle-plus fa-lg"></i> New Product</a>
    </div>

    <div class="shadow-lg rounded-lg overflow-hidden mx-4 mt-2 bg-white">
        <table class="w-full">
            <thead class="">
                <tr class="bg-cyan-200">
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">Name</th>
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">Image</th>
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">Description</th>
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">Brand</th>
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">Price</th>
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">Stock</th>
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">State</th>
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">Tipe</th>
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">Edit</th>
                    <th class="w-1/4 py-3 px-6 text-center uppercase border">Delete</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($product) && count($product) > 0)
                    @forelse ($product as $item)
                        <tr>
                            <td class="py-2 px-4 border">{{ $item->name }}</td>
                            <td class="py-2 px-4 border">{{ $item->image_url }}
                                @if ($item->image_url)
                                    <img src="{{ asset($item->image_url) }}" alt="Imagen del Producto">
                                @else
                                    Sin Imagen
                                @endif
                            </td>
                            <td class="py-2 px-4 border">{{ $item->description }}</td>
                            <td class="py-2 px-4 border">{{ $item->brand }}</td>
                            <td class="py-2 px-4 border">{{ $item->type }}</td>
                            <td class="py-2 px-4 border">{{ $item->stock }}</td>
                            <td class="py-2 px-4 border">{{ $item->state }}</td>
                            <td class="py-2 px-4 border">{{ $item->price }}</td>
                            <td class="py-2 px-4 border text-center">
                                <form action="{{ route('products.edit', $item->id) }}" method="GET">
                                    <button class="bg-yellow-500 px-3 py-2 rounded hover:bg-yellow-300"><i
                                            class="fa-solid fa-user-pen"></i></button>
                                </form>
                            </td>
                            <td class="py-2 px-4 border text-center">
                                <form action="{{ route('products.show', $item->id) }}" method="GET">
                                    <button class="bg-red-600 px-3 py-2 rounded hover:bg-red-300"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <span>NO registers!</span>
                @endif ($products as $item)

            </tbody>
        </table>
    </div>

    {{-- datatable --}}
@section('js')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            let tabla = $('#products').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                }
            });
        });
    </script>
@endsection

@endsection
