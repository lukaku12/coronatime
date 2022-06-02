<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
	use RefreshDatabase;

	public function test_reset_password_link_screen_can_be_rendered()
	{
		$response = $this->get('/forget-password');

		$response->assertStatus(200);
	}

	public function test_show_error_massage_if_user_does_not_enter_valid_email()
	{
		$this->withExceptionHandling();
		$response = $this->post('/forget-password', ['test@gmail.com']);
		$response->assertSessionHasErrors(['email']);
	}

	public function test_send_email_to_user_if_email_is_valid()
	{
		$this->withExceptionHandling();
		$user = User::factory()->create(['email' => 'lukakurdadze2@gmail.com']);
		$response = $this->post('/forget-password', ['email' => $user->email]);
		$response->assertSessionHasNoErrors();
	}

	public function test_show_reset_password_page_after_coming_from_mail()
	{
		$this->withExceptionHandling();

		$token = Str::random(64);

		$response = $this->get('/reset-password/{token}', ['token' => $token]);

		$response->assertStatus(200);
	}

	public function test_show_error_massage_if_users_entered_passwords_do_not_match()
	{
		$this->withExceptionHandling();
		$response = $this->post('/reset-password', ['password' => 'test12345', 'password_confirmation' => 'test']);
		$response->assertSessionHasErrors(['password']);
	}

	public function test_throw_validation_error_if_token_is_invalid()
	{
		$this->withExceptionHandling();

		$user = User::factory()->create();

		$this->session(['email' => $user->email]);

		$token = Str::random(64);

		DB::table('password_resets')->insert([
			'email'      => $user->email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);

		$response = $this->post('/reset-password', [
			'password'              => $user->password,
			'password_confirmation' => $user->password,
			'token'                 => 'THIS IS INVALID TOKEN',
		]);
		$response->assertSessionHasErrors(['password_confirmation']);
	}

	public function test_update_password_if_all_credentials_are_valid()
	{
		$this->withExceptionHandling();

		$user = User::factory()->create();

		$this->session(['email' => $user->email]);

		$token = Str::random(64);

		DB::table('password_resets')->insert([
			'email'      => $user->email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);

		$response = $this->post('/reset-password', [
			'password'              => $user->password,
			'password_confirmation' => $user->password,
			'token'                 => $token,
		]);
		$response->assertStatus(200);
	}
}
