@extends('layouts/layout')

@section("tituloPagina", "Delete Product")

@section('contenido')
<br><br>
<div class="card">
    <div class="card">
      <h5 class="card-header">Delete Product</h5>
    </div>
    <div class="card-body">
        <p class="card-text">
            <div class="alert alert-danger" role="alert">
                Do you want to remove this product?
              </div>
        </p>
        <table class="table table-sm table-hover">
                <thead>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>State</th>
                    <th>Tipe</th>
                </thead>
                <tbody>
                    <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->state }}</td>
                            <td>{{ $product->type }}</td>
                        </tr>
                </tbody>
            </table>    
    </div>
    <div class="card-footer text-body-secondary">
        <form action="{{ route("products.destroy", $product->id)}}" method="POST">
            @csrf
            @method('delete')

            <a href="{{ route("products.index")}}" class="btn btn-secondary"><i class="fa-solid fa-chevron-left"></i>Back</a>
            
            <button class="btn btn-danger">Delete</button>
        </form>    
    </div>
</div>
@endsection