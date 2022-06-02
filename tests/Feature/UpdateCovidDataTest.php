<?php

namespace Tests\Feature;

use App\Models\Statistic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UpdateCovidDataTest extends TestCase
{
	use RefreshDatabase;

	public function test_user_can_update_covid_data_with_artisan_command()
	{
		$this->withoutExceptionHandling();

		$countries = [
			['code' => 'GE', 'name' => ['en' => 'Georgia', 'ka' => 'საქართველო']],
		];
		Http::fake([
			'https://devtest.ge/countries' => Http::response($countries, 200),
		]);
		$statistic = [
			'id'          => 29,
			'country'     => 'Georgia',
			'code'        => 'GE',
			'confirmed'   => 2398,
			'recovered'   => 3147,
			'critical'    => 2349,
			'deaths'      => 477,
			'created_at'  => '2021-09-13T11:43:39.000000Z',
			'updated_at'  => '2021-09-13T11:43:39.000000Z',
		];
		Statistic::factory()->create($statistic);
		Http::fake([
			'https://devtest.ge/get-country-statistics' => Http::response($statistic, 200),
		]);

		$this->artisan('update:covid-data')->assertExitCode(0);
	}
}
