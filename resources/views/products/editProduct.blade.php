@extends('layouts/layout')

@section('tituloPagina', 'Edit Product')

@section('contenido')


    <div class="mx-auto max-w-7xl px-4 py-10 shadow-lg rounded-lg overflow-hidden">
        <div class="mx-auto max-w-2xl">
            <h1 class="text-2xl font-bold mb-4">Editar un producto</h1>
            {{-- Componente del formulario --}}
            <x-form :product=$product url="products.update" method="put" btnNameCancelar="Cancelar" btnNameSubmit="Actualizar" />
        </div>
    </div>
@endsection
