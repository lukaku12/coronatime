<x-layout>
    <div class="w-full h-full flex flex-col items-center">
        <div class="w-11/12 h-auto">
            <x-header/>
            <main>
                <x-navigation name="Statistics by country"/>
                <div class="mt-7">
                    <div class="mt-1 relative rounded-md shadow-sm max-w-sm">
                        <form method="GET">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <img src="{{ asset('assets/search.png') }}" alt="">
                            </div>
                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   class="lg:focus:border lg:focus:border-gray-700  focus:outline-none block w-full pl-10 sm:text-sm border-gray-300 rounded-md py-3"
                                   placeholder="{{ __('ui.Search by country') }}">
                        </form>
                    </div>
                    <div class="mt-7 w-full">
                        <table class="table-fixed h-1/3 divide-y divide-gray-300 w-full border-gray-300 border mb-5"
                        >
                            <x-table-head/>
                            <tbody class="overflow-y-scroll divide-y divide-gray-200 bg-white max-w-full"
                            >
                                @foreach($statistics as $statistic)
                                    <x-table-row :location="$statistic->country"
                                                 :new_cases="$statistic->confirmed"
                                                 :death="$statistic->recovered"
                                                 :recovered="$statistic->deaths"
                                    />
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if(count($statistics) === 0)
                    <h1 class="text-center">No Results Found!</h1>
                @endif
            </main>
        </div>
    </div>
</x-layout>
