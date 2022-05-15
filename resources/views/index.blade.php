<x-layout>
    <div class="w-full h-full flex flex-col items-center">
        <div class="w-11/12 h-auto">
            <x-header/>
            <main>
                <x-navigation
                    name="Worldwide Statistics"
                />
                <section class="flex flex-col gap-4 mt-7 w-full lg:flex-row">
                    <x-primary-card/>
                    <div class="flex gap-4 lg:w-4/5">
                        <x-secondary-card name="Recovered" bg_color="bg-green-100" image="recovered.png" />
                        <x-secondary-card name="Death" bg_color="bg-yellow-100" image="death.png" />
                    </div>
                </section>
            </main>
        </div>
    </div>
</x-layout>
