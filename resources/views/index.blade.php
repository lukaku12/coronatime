<x-layout>
    <div class="w-full h-full flex flex-col items-center">
        <div class="w-11/12 h-auto">
            <x-header/>
            <main>
                <x-navigation
                    name="worldwide_statistics"
                />
                <section class="flex flex-col gap-4 mt-7 w-full lg:flex-row">
                    <x-primary-card amount="{{ $total_cases }}"/>
                    <div class="flex gap-4 lg:w-4/5">
                        <x-secondary-card name="recovered" bg_color="bg-green-100" image="recovered.png" amount="{{ $recovered }}" />
                        <x-secondary-card name="death" bg_color="bg-yellow-100" image="death.png" amount="{{ $deaths }}" />
                    </div>
                </section>
            </main>
        </div>
    </div>
</x-layout>
