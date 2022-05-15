@props(['name', 'bg_color', 'image' ])
<div class="py-7 rounded-xl w-1/2 {{ $bg_color }} flex flex-col items-center h-full lg:max-w-md lg:aspect-video justify-center">
    <img src="{{ asset('assets/' . $image) }}" alt="">
    <h1 class="py-4">{{ __('ui.' . $name) }}</h1>
    <h1 class="text-blue-800 font-bold text-2xl">715,523</h1>
</div>
