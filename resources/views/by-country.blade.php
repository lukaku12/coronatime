<x-layout>
    <div class="w-full h-full flex flex-col items-center">
        <div class="w-11/12 h-auto">
            <x-header/>
            <main>
                <x-navigation name="Statistics by country"/>
                <div class="mt-7">
                    <div class="mt-1 relative rounded-md shadow-sm max-w-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <img src="{{ asset('assets/search.png') }}" alt="">
                        </div>
                        <input type="text" name="search_by_country" id="search_by_country"
                               class="lg:focus:border lg:focus:border-gray-700  focus:outline-none block w-full pl-10 sm:text-sm border-gray-300 rounded-md py-3"
                               placeholder="{{ __('ui.Search by country') }}">
                    {{--    TODO table     --}}
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-layout>
