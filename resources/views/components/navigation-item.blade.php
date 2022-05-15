@props(['name', 'href', 'active' => false])
@php
    $classes = 'py-3';

        if ($active) {
            $classes .= ' border-b-4 border-black';
        }
@endphp
<div  {{ $attributes(['class' => $classes]) }}>
    <a href="/{{ $href }}" class="py-3">{{ __('ui.' . $name) }}</a>
</div>
