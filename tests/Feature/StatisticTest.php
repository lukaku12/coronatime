<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatisticTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function this_redirect_user_from_home_if_user_is_not_authenticated()
	{
		$this->withExceptionHandling();
		$response = $this->get('/');

		$response->assertRedirect('login');
	}

	/** @test */
	public function test_check_if_user_is_authenticated_to_see_worldwide_statistics_page()
	{
		$this->withoutExceptionHandling();
		$user = User::factory()->create(['password' => bcrypt('gela')]);
		$response = $this->post('/sessions', [
			'username' => $user->username,
			'password' => 'gela',
		]);
		$this->assertAuthenticated();

		$response = $this->get('/');

		$response->assertRedirect('worldwide');
	}

	/** @test */
	public function test_a_user_can_see_worldwide_statistics_page()
	{
		$this->withoutExceptionHandling();
		$user = User::factory()->create(['password' => bcrypt('gela')]);
		$response = $this->post('/sessions', [
			'username' => $user->username,
			'password' => 'gela',
		]);
		$this->assertAuthenticated();

		$response = $this->get('/worldwide');

		$response->assertStatus(200);
	}

	/** @test */
	public function test_check_if_user_is_authenticated_to_see_statistics_by_country_page()
	{
		$user = User::factory()->create(['password' => bcrypt('gela')]);
		$response = $this->post('/sessions', [
			'username' => $user->username,
			'password' => 'gela',
		]);
		$this->assertAuthenticated();

		$response = $this->get('/by-country');

		$response->assertStatus(200);
	}
}
