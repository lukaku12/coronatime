<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
	use RefreshDatabase;

	public function test_registration_screen_can_be_rendered()
	{
		$response = $this->get('/register');

		$response->assertStatus(200);
	}

	public function test_new_users_can_register()
	{
		$response = $this->post('/register/create', [
			'username'                  => 'Test User',
			'email'                     => 'test@example.com',
			'password'                  => 'password',
			'repeat_password'           => 'password',
		]);

		$this->assertAuthenticated();
		$response->assertRedirect('/verify-email');
	}
}
