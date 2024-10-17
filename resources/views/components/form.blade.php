<div>
    <form action="{{ route($url, $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)
        <div class="border-b border-l-gray-900/10 pb-12">

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8">

                <x-input-field name="name" label="Nombre" type="text" value="{{ old('name', $product->name) }}"
                    placeholder="Name for Product" />

                <x-input-field name="image" label="Imagen" type="file"
                    value="{{ old('image', $product->image_url) }}" placeholder="Ingrese una imagen"
                    image="{{ $product->image_url }}" alt="Imagen del producto" />

                <x-input-field name="price" label="Precio" type="text" value="{{ old('price', $product->price) }}"
                    placeholder="Ejemplo: 1000" />

                <x-text-area name="description" label="Descripcion"
                    value="{{ old('description', $product->description) }}"
                    placeholder="Escriba aqui una descripcion para el producto" />


            </div>

        </div>

        {{-- BOTONES --}}
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ route('products.index') }}"
                class="px-4 py-2 bg-red-600 text-white rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ $btnNameCancelar }}</a>
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ $btnNameSubmit }}</button>
        </div>

    </form>
</div>
