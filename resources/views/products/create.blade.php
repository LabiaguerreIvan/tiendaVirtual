@extends('layouts/layout')

@section('tituloPagina', 'Create a New Product')

@section('contenido')
    
{{-- BODY COLOR --}}
    <div class="bg-white">


        <div class="mx-auto max-w-7xl px-4 py-10 shadow-lg rounded-lg overflow-hidden">
            
            <div class="mx-auto max-w-2xl">
            
                {{-- Componente del formulario --}}
                <x-form :product=$product url="products.store" method="post" btnNameCancelar="Cancelar" btnNameSubmit="Guardar" />

            </div>

        </div>


    </div>

@endsection
