<x-reset-password-layout :action="route('forget.password.post')" button_name="reset_password">
    <x-form.input name="email" type="email" translatable="email" placeholder="enter_your_email"/>
</x-reset-password-layout>
