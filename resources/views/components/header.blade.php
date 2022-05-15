<header class="flex items-center justify-between w-full mb-10">
    <div class="w-1/2">
        <img class="py-5 pointer-events-none select-none"
             src="{{ asset('assets/coronatime-logo.png') }}"
             alt="Coronatime"
        >
    </div>
    <div class="flex w-1/2 h-full justify-end gap-11">
        <button class="flex items-center gap-2 items-end">
            <h2>{{ __('ui.English') }}</h2>
            <img src="{{ asset('assets/down-arrow.png') }}" alt="=">
        </button>
        <button class="lg:hidden">
            <img src="{{ asset('assets/Vectorburger-button.png') }}" alt="=">
        </button>
        <div class="hidden lg:flex">
            <h1 class="font-bold pr-5 border-r-2">Takeshi K.</h1>
            <button class="pl-5">{{ __('ui.Log Out') }}</button>
        </div>
    </div>
</header>
