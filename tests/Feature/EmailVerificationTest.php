<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
	use RefreshDatabase;

	public function test_check_if_user_has_verified_email()
	{
		$user = User::factory()->create([
			'email_verified_at' => date('Y-m-d H:i:s'),
		]);

		$response = $this->actingAs($user)->get('/verify-email');

		$response->assertRedirect('/');
	}

	public function test_email_verification_screen_can_be_rendered()
	{
		$user = User::factory()->create([
			'email_verified_at' => null,
		]);

		$response = $this->actingAs($user)->get('/verify-email');

		$response->assertStatus(200);
	}

	public function test_email_can_be_verified()
	{
		$this->withExceptionHandling();
		$user = [
			'username'                  => 'Test User',
			'email'                     => 'test@example.com',
			'password'                  => 'password',
			'repeat_password'           => 'password',
		];
		$this->post('/register/create', $user);
		$this->assertAuthenticated();
		$this->post('/verify-email/request');
	}

	public function test_email_is_not_verified_with_invalid_hash()
	{
		$this->withoutExceptionHandling();

		$user = [
			'username'         => 'Test User',
			'email'            => 'test@example.com',
			'password'         => 'password',
			'repeat_password'  => 'password',
		];
		$this->post('/register/create', $user);

		$this->assertAuthenticated();

		$this->post('/verify-email/request');

		$databaseUser = User::first();

		$verificationUrl = URL::temporarySignedRoute(
			'verification.verify',
			now()->addMinutes(60),
			['id' => $databaseUser->id, 'hash' => sha1($databaseUser->email)]
		);

		$this->actingAs($databaseUser)->get($verificationUrl);

		$this->assertTrue($databaseUser->fresh()->hasVerifiedEmail());
	}
}
