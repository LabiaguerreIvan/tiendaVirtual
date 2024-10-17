@extends('layouts/layout')

@section('tituloPagina', 'Edit Product')

@section('contenido')


    <div class="mx-auto max-w-7xl px-4 py-10 shadow-lg rounded-lg overflow-hidden">
        <div class="mx-auto max-w-2xl">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Product</h2>

            <x-form :product=$product url="products.update" method="put" btnNameCancelar="Cancelar" btnNameSubmit="Actualizar" />

        </div>
    </div>
@endsection
