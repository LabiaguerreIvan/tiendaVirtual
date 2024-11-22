<div>
    <!-- Etiqueta para el campo de entrada, con estilos que indican error si lo hay -->
    <label for="{{ $name }}"
        class="block text-lg font-medium leading-6 text-gray-900 @error($name) text-red-500 @enderror">
        {{ $label }}
    </label>

    <div class="mt-2">
        <!-- Campo de entrada para el archivo -->
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            class="block w-full rounded-md text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 
            @error($name) bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror"
            placeholder="{{ $placeholder }}" value="{{ $value }}"
            onchange="previewImage(event, '{{ $name }}')">
        <!-- Llama a la función `previewImage` al cambiar el archivo -->

        <!-- Mensaje de error si la validación falla -->
        @error($name)
            <p class="mt-2 text-sm text-red-500"><span class="font-medium">Ups!</span> {{ $message }}</p>
        @enderror

        <!-- Contenedor para la imagen de vista previa -->
        <div class="mt-4">
            @if ($image != '')
                <!-- Si ya existe una imagen, se muestra como vista previa -->
                <img id="preview-{{ $name }}" src="{{ $image }}" alt="{{ $alt }}"
                    class="w-80 h-80 object-cover rounded-md border">
            @else
                <!-- Si no hay imagen previa, el contenedor se oculta inicialmente -->
                <img id="preview-{{ $name }}" src="#" alt="{{ $alt }}"
                    class="w-80 h-80 object-cover rounded-md border hidden">
            @endif
        </div>
    </div>
</div>

<script>
    /**
     * Función para manejar la vista previa de la imagen
     * @param {Event} event - El evento `change` del campo de archivo
     * @param {String} inputName - El nombre del campo de archivo
     */
    function previewImage(event, inputName) {
        const input = event.target; // Obtiene el campo de entrada que activó el evento
        const preview = document.getElementById(`preview-${inputName}`); // Obtiene el elemento de vista previa asociado

        // Comprueba si hay un archivo seleccionado
        if (input.files && input.files[0]) {
            const reader = new FileReader(); // Crea una nueva instancia de FileReader

            // Cuando el archivo se carga correctamente, actualiza la vista previa
            reader.onload = function(e) {
                preview.src = e.target.result; // Establece la imagen cargada como fuente (src)
                preview.classList.remove('hidden'); // Muestra la imagen si estaba oculta
            };

            reader.readAsDataURL(input.files[0]); // Convierte el archivo seleccionado en una URL
        }
    }
</script>
