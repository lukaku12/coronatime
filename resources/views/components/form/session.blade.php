@props(['text', 'action', 'url'])
<div class="w-full my-7">
    <p class="text-sm text-center text-gray-500">
        {{ __('session.' . $text) }}
        <a href="{{ $url }}" class="font-bold text-black">
            {{ __('session.'. $action) }}
        </a>
    </p>
    <div class="flex items-center justify-center gap-2 text-gray-400 text-sm">
        <a href="/set-language/ka" class="pr-2 border-r-2">{{strtolower(__('ui.Georgian'))}}</a>
        <a href="/set-language/en">{{strtolower(__('ui.English'))}}</a>
    </div>
</div>
