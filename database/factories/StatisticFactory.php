<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Statistic>
 */
class StatisticFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		$country = $this->faker->country();
		return [
			'code'               => substr($country, 0, 3),
			'country'            => ['en' => $country, 'ka' => $country],
			'confirmed'          => (new \Faker\Core\Number)->numberBetween(0, 200000),
			'recovered'          => (new \Faker\Core\Number)->numberBetween(0, 150000),
			'critical'           => (new \Faker\Core\Number)->numberBetween(0, 30000),
			'deaths'             => (new \Faker\Core\Number)->numberBetween(0, 20000),
			'created_at'         => now(),
			'updated_at'         => now(),
		];
	}
}
