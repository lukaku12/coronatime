@php
    $language = app()->getLocale('language')
@endphp
<header class="flex items-center justify-between w-full mb-10">
    <div class="w-1/2">
        <a href="{{ route('worldwide') }}">
            <img class="py-5"
                 src="{{ asset('assets/coronatime-logo.png') }}"
                 alt="Coronatime"
            >
        </a>
    </div>
    <div class="flex w-1/2 h-full justify-end gap-11">
        <div x-data="{ show: false }" @click.away="show = false" @click="show = ! show">
            <button class="flex items-center gap-2 items-end relative"
            >
                <h2>{{ $language === 'ka' ? __('ui.Georgian') : __('ui.English') }}</h2>
                <img src="{{ asset('assets/down-arrow.png') }}" alt="=">

            </button>
            <div x-show="show" class="absolute">
                <a href="/set-language/{{ $language === 'ka' ? 'en' : 'ka' }}">{{ $language === 'ka' ? __('ui.English') : __('ui.Georgian') }}</a>
            </div>
        </div>
        {{--burgir--}}
        <div class="relative text-center" x-data="{ show: false }" @click.away="show = false">
            <button class="lg:hidden"
                    @click="show = ! show">
                <img src="{{ asset('assets/Vectorburger-button.png') }}" alt="=">
            </button>
            <div class="absolute border rounded-md p-3 right-0 w-auto w-max bg-white" x-show="show">
                <h1 class="font-bold">{{ ucwords(auth()->user()->username) }}</h1>
                <hr class="my-1"/>
                <form method="POST" class="w-full" action="/logout">
                    @csrf
                    <button class="text-gray-400">{{ __('ui.Log Out') }}</button>
                </form>
            </div>
        </div>
        {{--endburgir--}}
        <div class="hidden lg:flex">
            <h1 class="font-bold pr-5 border-r-2">{{ ucwords(auth()->user()->username) }}</h1>
            <form method="POST" action="/logout">
                @csrf
                <button class="pl-5">{{ __('ui.Log Out') }}</button>
            </form>
        </div>
    </div>
</header>
