@props(['location', 'new_cases' => '-', 'death' => '-', 'recovered' => '-'])
<tr>
    <td class="whitespace-nowrap py-4 pl-4 pr-3 font-medium text-gray-900 text-xs md:text-base lg:text-xl sm:pl-6">
        @if($location === 'United States of America')
            United States
        @elseif($location === 'ამერიკის შეერთებული შტატები')
            შეერთებული შტატები
        @else
            {{ $location }}
        @endif
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
