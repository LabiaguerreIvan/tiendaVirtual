@extends('layouts/layout')

@section('tituloPagina', 'Create a New Product')

@section('contenido')
    
{{-- BODY COLOR --}}
    <div class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-10 shadow-lg rounded-lg overflow-hidden">
            <div class="mx-auto max-w-2xl">
                <h1 class="text-2xl font-bold mb-4">Agregar nuevo producto</h1>            
                {{-- Componente del formulario --}}
                <x-form :product=$product url="products.store" method="post" btnNameCancelar="Cancelar" btnNameSubmit="Guardar" />
            </div>
        </div>
    </div>

@endsection
