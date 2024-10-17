<div>
    <label for="{{ $name }}"
        class="block text-lg font-medium leading-6 text-gray-900 @error($name) text-red-500 @enderror">
        {{ $label }} </label>

    <div class="mt-2">
        <textarea name="{{ $name }}" id="{{ $name }}"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 
            @error($name) bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror"
            placeholder="{{ $placeholder }}">{{ $value }}</textarea>

        @error($name)
            <p class="mt-2 text-sm text-red-500"><span class="font-medium">Ups!</span> {{ $message }}
            </p>
        @enderror
    </div>
</div>
