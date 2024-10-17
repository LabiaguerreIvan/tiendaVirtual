
 <div>
    <label for="{{ $name }}" class="block text-lg font-medium leading-6 text-gray-900 @error( $name ) text-red-500 @enderror"> {{ $label }} </label>

    <div class="mt-2">
        <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="name" 
        class="block w-full rounded-md  text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 
        
        @error( $name ) bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror"
            placeholder="{{ $placeholder }}" value="{{ $value }}">

        @error( $name )
            {{-- $message devuelve una mensaje por defecto dependiendo la condicion en el controlador (required) --}}
            <p class="mt-2 text-sm text-red-500"><span class="font-medium">Ups!</span> {{ $message }}
            </p>
        @enderror

        @if ($image != "")
            <img src="{{ ($image) }}" alt="{{$alt}}">
        @endif
    </div>
</div>
