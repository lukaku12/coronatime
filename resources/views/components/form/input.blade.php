@props(['name', 'type' => 'text', 'translatable', 'placeholder' => ''])
<div class="mt-4">
    <label
        class="font-bold"
        for="{{ $name }}"
    >
        {{ucwords(__('session.' . $translatable)) }}
    </label>
    <div class="mt-1">
        <input class="text-lg shadow-sm py-3 px-3 border focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-200 rounded-md"
               name="{{ $name }}"
               id="{{ $name }}"
               type="{{ $type }}"
               placeholder="{{ __('session.' . $placeholder) }}"
        >
    </div>
</div>
