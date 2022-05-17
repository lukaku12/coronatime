<x-layout>
    <div class="w-full h-full flex flex-col items-center">
        <div class="w-11/12 h-auto w-full h-full">
            <x-header/>
            <div class="w-full h-full flex flex-col justify-center items-center">
                <div
                    class="border flex flex-col gap-y-2 text-center rounded-xl py-8 px-5 shadow-lg shadow-gray-50/20 max-w-lg">
                    <div class="w-full flex flex-col items-center">
                        <img class="w-14 h-14" src="{{ asset('assets/succsess.png') }}" alt="">
                    </div>
                    <h1 class="font-bold">{{__('session.Confirmation Email Has Been Sent!')}}</h1>
                    <p class="text-gray-400">{{__('session.please confirm your email before we continue')}}</p>
                    <form action="{{ route('verification.request') }}" method="post">
                        @csrf
                        <x-form.button name="Request a new link"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
