@props(['name', 'active' => false, 'classRotate' => '', 'direction'])
@php
    $classes = ' opacity-30';
    if ($active)
    {
        $classes = ' opacity-100';
    }
@endphp
<a href="/by-country/?sort_by={{$name === 'country' ? $name . '->' . app()->getLocale() : $name }}&order_direction={{$direction}}&{{http_build_query(request()->except('sort_by', 'page', 'order_direction'))}}">
    <img class="{{ $classRotate . $classes }}" src="{{asset('assets/downArrow.png')}}" alt="">
</a>
