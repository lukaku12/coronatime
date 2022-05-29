@props(['name', 'title', 'class' => ''])
@php
    $urlActiveASC = "/by-country?order_direction=ASC&sort_by=$name";
    $urlActiveASC_WithSearch = '/by-country?order_direction=ASC&search=' . request('search') . '&sort_by=' . $name;
    $urlActiveDESC = "/by-country?order_direction=DESC&sort_by=$name";
    $urlActiveDESC_WithSearch = '/by-country?order_direction=DESC&search=' . request('search') . '&sort_by=' . $name;
@endphp
<th scope="col"
    class="py-3.5 text-left text-xs md:text-base lg:text-xl font-semibold text-gray-900 text-xs break-all"
>
    <div class="flex gap-2 {{ $class }}">
        {{ __('ui.' . $title) }}
        <div class="flex flex-col gap-1">
            <x-table-head-image
                :name="$name"
                direction="ASC"
                classRotate="rotate-180"
                :active='str_contains(url()->full(), $urlActiveASC) || str_contains(url()->full(), $urlActiveASC_WithSearch)'
            />
            <x-table-head-image
                :name="$name"
                direction="DESC"
                :active='str_contains(url()->full(), $urlActiveDESC) || str_contains(url()->full(), $urlActiveDESC_WithSearch)'
            />
        </div>
    </div>
</th>
