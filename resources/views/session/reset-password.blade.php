<x-reset-password-layout :action="route('reset.password.post')" button_name="reset_password">
    <input type="hidden" name="token" value="{{ $token }}">
    <x-form.input name="password" type="password" translatable="new_password" placeholder="enter_new_password"/>
    <x-form.input name="password_confirmation" type="password" translatable="repeat_password" placeholder="repeat_password"/>
</x-reset-password-layout>
