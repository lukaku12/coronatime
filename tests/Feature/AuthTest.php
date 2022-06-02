<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
	use RefreshDatabase;

	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	/* @test */
	public function test_login_screen_can_be_rendered()
	{
		$response = $this->get('/login');

		$response->assertStatus(200);
	}

	/* @test */
	public function test_users_can_authenticate_using_the_login_screen()
	{
		$this->withoutExceptionHandling();

		$user = User::factory()->create(['password' => bcrypt('gela')]);
		$response = $this->post('/sessions', [
			'username' => $user->username,
			'password' => 'gela',
		]);

		$this->assertAuthenticated();
		$response->assertRedirect(RouteServiceProvider::HOME);
	}
}
