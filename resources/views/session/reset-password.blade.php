<x-reset-password-layout :action="route('reset.password.post')" button_name="Reset Password">
    <input type="hidden" name="token" value="{{ $token }}">
    <x-form.input name="password" type="password" translatable="New password" placeholder="Enter new password"/>
    <x-form.input name="password-confirm" type="password" translatable="Repeat password" placeholder="Repeat password"/>
</x-reset-password-layout>
