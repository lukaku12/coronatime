<x-layout>
    <x-form-wrapper>
        <x-form.header main_text="Welcome to Coronatime" secondary_text="Please enter required info to sign up"/>
        <form method="POST" action="/register/create" class="mt-4 lg:w-full">
            @csrf
            <x-form.input name="username" translatable="Username" placeholder="Enter unique username"/>
            <x-form.input name="email" type="email" translatable="Email" placeholder="Enter your email"/>
            <x-form.input name="password" type="password" translatable="Password" placeholder="Fill in password"/>
            <x-form.input name="repeat_password" type="password" translatable="Repeat password"
                          placeholder="Repeat password"/>

            <x-form.checkbox name="Remember this device"/>

            <x-form.button name="SIGN UP"/>

            <x-form.session text="Already have an account?" action="Log in" url="/login"/>
        </form>
    </x-form-wrapper>
</x-layout>
