@props(['amount'])
<div class="py-7 rounded-xl bg-blue-100 flex flex-col items-center lg:w-2/5 lg:max-w-md lg:aspect-video justify-center">
    <img src="{{ asset('assets/new-cases.png') }}" alt="">
    <h1 class="py-4">{{ __('ui.New cases') }}</h1>
    <div x-data="{ current: 0, target: {{ $amount }}, time: 500}" x-init="() => {
        start = current;
        const interval = Math.max(time / (target - start), 5);
        const step = (target - start) /  (time / interval);
        const handle = setInterval(() => {
            if(current < target)
                current += step
            else {
                clearInterval(handle);
                current = target
            }
            }, interval)
    }">
        <h1 class="text-blue-800 font-bold text-2xl" x-text="Math.round(current).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')"></h1>
    </div>
</div>
