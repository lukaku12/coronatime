<x-layout>
    <x-form-wrapper>
        <x-form.header main_text="welcome_to_coronatime" secondary_text="please_enter_required_info_to_sign_up"/>
        <form method="POST" action="/register/create" class="mt-4 lg:w-full">
            @csrf
            <x-form.input name="username" translatable="username" placeholder="enter_unique_username"/>
            <x-form.input name="email" type="email" translatable="email" placeholder="enter_your_email"/>
            <x-form.input name="password" type="password" translatable="password" placeholder="fill_in_password"/>
            <x-form.input name="repeat_password" type="password" translatable="repeat_password"
                          placeholder="repeat_password"/>

            <x-form.checkbox name="remember_this_device"/>

            <x-form.button name="sign_up"/>

            <x-form.session text="already_have_an_account" action="log_in" url="/login"/>
        </form>
    </x-form-wrapper>
</x-layout>
