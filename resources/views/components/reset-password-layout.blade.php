@props(['action' => '#', 'button_name'])
<x-layout>
    <section class="w-full h-full flex flex-col items-center">
        <main class="w-11/12 h-full lg:w-3/5 lg:flex lg:items-center lg:flex-col">
            <div class="w-full h-full xl:w-2/5 lg:w-3/4">
                <header class="w-full lg:grid lg:place-items-center">
                    <img class="py-5 pointer-events-none select-none"
                         src="{{ asset('assets/coronatime-logo.png') }}"
                         alt="Coronatime"
                    >
                    <div class="mt-4 text-center lg:mt-32">
                        <h2 class="font-extra-bold text-2xl">{{ __('session.Reset Password') }}</h2>
                    </div>
                </header>
                <form class="mt-11 lg:w-full" method="POST" action="{{ $action }}">
                    @csrf
                    {{ $slot }}
                    <div
                        class="w-11/12 absolute bottom-7 max-w-lg left-1/2 -translate-x-2/4 lg:static lg:translate-x-0 lg:w-full lg:mt-16 lg:max-w-2xl"
                    >
                        <button class="w-full bg-green-500 py-3 rounded-md font-bold text-white">
                            {{ strtoupper(__('session.' . $button_name)) }}
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </section>
</x-layout>
