@props(['name'])
{{--active="{{\Illuminate\Support\Facades\Route::current()->getName() === 'worldwide'}}"--}}

<div class="w-full">
    <h1 class="my-7 font-bold text-2xl">{{ __('ui.' . $name) }}</h1>
    <div class="flex gap-4">
        <x-navigation-item href="worldwide" name="Worldwide" active="{{\Illuminate\Support\Facades\Route::current()->getName() === 'worldwide'}}"/>
        <x-navigation-item href="by-country" name="By country" active="{{\Illuminate\Support\Facades\Route::current()->getName() === 'by-country'}}"/>
    </div>
</div>
