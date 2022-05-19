<x-layout>
    <div class="w-full h-screen flex flex-col items-center">
        <div class="w-11/12 h-auto w-full h-screen">
            <header class="w-full flex lg:justify-center">
                <img class="absolute mt-2.5" src="{{ asset('assets/coronatime-logo.png') }}" alt="">
            </header>
            <div class="w-full h-full flex flex-col justify-center items-center">
                <div
                    class="border flex flex-col gap-y-2 text-center rounded-xl py-8 px-5 shadow-lg shadow-gray-50/20 max-w-lg">
                    <div class="w-full flex flex-col items-center">
                        <img class="w-14 h-14" src="{{ asset('assets/succsess.png') }}" alt="">
                    </div>
                    <h1 class="font-bold">{{__('session.Your password has been updated successfully')}}</h1>
                    <a href="/login" class="w-full">
                        <x-form.button name="Sign In"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
