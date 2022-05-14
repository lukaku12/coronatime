<x-layout>
    <x-form-wrapper>
        <x-form.header main_text="Welcome back" secondary_text="Welcome back! Please enter your details"/>
        <form class="mt-4 lg:w-full">
            @csrf
            <x-form.input name="username" translatable="Username" placeholder="Enter unique username or email"/>
            <x-form.input name="password" type="password" translatable="Password"
                          placeholder="Fill in password"/>

            <x-form.checkbox name="Remember this device" password_reset="Forgot password?"/>

            <x-form.button name="LOG IN"/>

            <x-form.session text="Don’t have and account?" action="Sign up for free" url="/register"/>
        </form>
    </x-form-wrapper>
</x-layout>
