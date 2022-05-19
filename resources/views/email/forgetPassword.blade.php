<x-email-template
    main_text="RECOVER PASSWORD"
    secondary_text="click this button to recover a password"
    action="{{ route('reset.password.get', $token) }}"
    action_name="Reset Password"
/>
