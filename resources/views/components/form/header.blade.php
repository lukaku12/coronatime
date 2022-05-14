@props(['main_text', 'secondary_text'])
<header class="w-full">
    <img class="py-5 pointer-events-none select-none"
         src="{{ asset('assets/coronatime-logo.png') }}"
         alt="Coronatime"
    >
    <div class="mt-4">
        <h2 class="font-extra-bold text-2xl">{{ __('session.' . $main_text) }}</h2>
        <h3 class="text-slate-500 text-lg mt-1">{{ __('session.' . $secondary_text) }}</h3>
    </div>
</header>
