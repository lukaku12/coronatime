@props(['location', 'new_cases' => '-', 'death' => '-', 'recovered' => '-'])
<tr>
    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 text-xs lg:text-lg sm:pl-6">
        {!! str_replace(" ", "</br>", $location) !!}
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
