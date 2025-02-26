<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function catalog()
    {
        $products = Product::query()
        -> when(request('search'), function($query){
            $query->where('name', 'like', '%' . request('search') . '%');
        })->get();



        return Inertia::render('Products/Catalog', ['products' => $products]);
    }


    public function index()
    {
        // Recuperar los productos ordenados de manera ascendente por id y con paginación
        $product = Product::orderBy('id', 'asc')->paginate(10);
    
        // Transformación para agregar 'short_description' a cada producto
        $product->getCollection()->transform(function ($product) {
            $product->short_description = Str::limit($product->description, 50, '...');
            return $product;
        });
    
        // Retorna la vista con los productos paginados y transformados
        return view('products.index', compact('product'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        return view('products/create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', //Maximo 2MB
            'description' => 'required|string|max:1000',
            'price' => 'required|decimal:2',
            // 'brand' => 'required',
            // 'stock' => 'required',
            // 'state' => 'required',
            // 'type' => 'required'
        ]);

        //Guardar la imagen en el servidor
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/products', $imageName); //Guardar en storage/app/public/products
            $imageUrl = Storage::url($imagePath); // Obtener la URL publica
        }

        // Si la validación pasa, se guarda el producto
        $product = new Product();

        $product->name = $request->name;
        $product->image_url = $imageUrl ?? null; // Si no hay imagen, se asigna null
        $product->description = $request->description;
        $product->price = $request->price;
        // $product->brand = $request->brand;
        // $product->stock = $request->stock;
        // $product->state = $request->state;
        // $product->type = $request->type;

        $product->save();

        return redirect()->route("products.index")->with('New', 'A product was added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products/deleteProduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        return view("products/editProduct", compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', //Maximo 2MB
            'description' => 'required|string|max:1000',
            'price' => 'required|decimal:2',
            // 'brand' => 'required',
            // 'stock' => 'required',
            // 'state' => 'required',
            // 'type' => 'required'
        ]);

        // Requiperar el producto por el ID que recibimos
        $product = Product::find($id);

        // Verificar si se cargo una nueva imagen
        if ($request->hasFile('image')) {
            //Guardar la imagen en el servidor
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('public/products', $imageName); //Guardar en storage/app/public/products
            $imageUrl = Storage::url($imagePath); // Obtener la URL publica

            // Si se subio una nueva imagen, se elimina la anterior
            if ($product->image_url) {
                // Storage::delete(str_replace('/storage', 'public', $product->image_url));
                Storage::delete($product->image_url);
            }
        } else {
            // Si no se cargo una nueva imagen, se mantiene la anterior
            $imageUrl = $product->image_url;
        }

        // Asignar los nuevos valores a los campos con el request
        $product->name = $request->name;
        $product->image_url = $imageUrl; // Mantener la URL de la imagen anterior si no se subio una nueva
        $product->description = $request->description;
        $product->price = $request->price;
        // $product->brand = $request->brand;
        // $product->stock = $request->stock;
        // $product->state = $request->state;
        // $product->type = $request->type;

        // Actualizar el producto
        $product->save();

        return redirect()->route('products.index')->with('actualizado', 'Se actualizó el producto correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('borrado','Se borro el producto exitosamente');
    }
}
