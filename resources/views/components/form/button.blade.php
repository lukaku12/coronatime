@props(['name'])
<div class="w-full mt-7">
    <button class="w-full bg-green-500 py-3 rounded-md font-bold text-white">
        {{ __('session.' . $name) }}
    </button>
</div>
