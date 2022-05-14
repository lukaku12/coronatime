@props(['text', 'action', 'url'])
<div class="w-full my-7">
    <p class="text-sm text-center text-gray-500">
        {{ __('session.' . $text) }}
        <a href="{{ $url }}" class="font-bold text-black">
            {{ __('session.'. $action) }}
        </a>
    </p>
</div>
