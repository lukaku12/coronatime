<section class="w-full h-full flex flex-col items-center lg:flex-row">
    <main class="w-11/12 h-full lg:w-3/5 lg:flex lg:items-center lg:flex-col lg:justify-center">
        <div class="w-full h-full xl:w-2/5 lg:w-3/4 lg:flex lg:items-center lg:flex-col lg:justify-center">
            {{ $slot }}
        </div>
    </main>
    <x-image/>
</section>
