@props(['name', 'type' => 'text', 'translatable', 'placeholder' => ''])
@php
    $inputClass = "text-lg shadow-sm py-3 px-3 border focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-200 rounded-md "
@endphp
<div class="mt-4">
    <label class="font-bold" for="{{ $name }}">
        {{ucwords(__('session.' . $translatable)) }}
    </label>
    <div class="mt-2.5">
        <input class="{{ $inputClass . ($errors->has($name) ? 'invalid:border-red-500' : '') . (!$errors->has($name) && old($name) !== null ? 'valid:border-green-500' : '') }}"
               name="{{ $name }}"
               id="{{ $name }}"
               type="{{ $type }}"
               value="{{ $name !== 'repeat_password' ? old($name) : '' }}"
               placeholder="{{ __('session.' . $placeholder) }}"
               required
        >
        @error($name)
        <div class="flex gap-1 mt-2 items-center">
            <img class="w-4 h-4" src="{{ asset('./assets/errorImage.png') }}" alt="">
            <p class="text-red-600">{{ $message }}</p>
        </div>
        @enderror
    </div>
</div>
