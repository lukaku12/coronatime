<?php

namespace Tests\Feature;

use App\Models\Statistic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SearchTest extends TestCase
{
	use RefreshDatabase;

	public function test_users_can_search_in_statistics_by_country_page()
	{
		$this->withoutExceptionHandling();
		$user = User::factory()->create(['password' => bcrypt('gela')]);
		$response = $this->post('/sessions', [
			'username' => $user->username,
			'password' => 'gela',
		]);

		$this->assertAuthenticated();

		$statistics = Statistic::factory(5)->create();
		$randomStatisticCountry = $statistics[random_int(0, 4)]->country;
		$response = $this->get("/by-country?search=$randomStatisticCountry");

		$response->assertStatus(200);
	}
}
