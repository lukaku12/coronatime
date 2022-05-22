<x-layout>
    <x-form-wrapper>
        <x-form.header main_text="welcome_back" secondary_text="welcome_back_please_enter_your_details"/>
        <form class="mt-4 lg:w-full" method="POST" action="/sessions">
            @csrf
            <x-form.input name="username" translatable="username" placeholder="enter_unique_username_or_email"/>
            <x-form.input name="password" type="password" translatable="password" placeholder="fill_in_password"/>

            <x-form.checkbox name="remember_this_device" password_reset="forgot_password"/>

            <x-form.button name="log_in"/>

            <x-form.session text="dont_have_and_account" action="sign_up_for_free" url="/register"/>
        </form>
    </x-form-wrapper>
</x-layout>
