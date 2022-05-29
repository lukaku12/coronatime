@props(['location', 'new_cases' => '-', 'death' => '-', 'recovered' => '-'])
<tr>
    <td x-data="if (window.innerWidth < 700) {open = false}
                else {open = true}"
        @resize.window="width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
                        if (width < 700) open = false
                        else open = true"
        class="whitespace-nowrap py-4 pl-4 pr-3 font-medium text-gray-900 text-xs md:text-base lg:text-xl sm:pl-6">
        <div x-show="open">{{ $location }}</div>
        <div x-show="!open">{!! str_replace(" ", '<br>', $location) !!}</div>
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-xs lg:text-lg">
        {{ $new_cases }}
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-xs lg:text-lg">
        {{ $death }}
    </td>
    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-xs lg:text-lg">
        {{ $recovered }}
    </td>
</tr>
