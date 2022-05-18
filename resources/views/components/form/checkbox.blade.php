@props(['name', 'password_reset' => ""])
<div class="mt-7 flex items-center text-xs justify-between">
    <div class="flex items-center gap-2">
        <input id="remember_device" name="remember_device" class="w-5 h-5 " type="checkbox">
        <label class="font-medium" for="remember_device">{{ __('session.' . $name) }}</label>
    </div>
    @if(!$password_reset == "")
        <div class="text-right">
            <a class="text-blue-700 font-bold" href="/forget-password">{{ __('session.' . $password_reset) }}</a>
        </div>
    @endif

</div>
