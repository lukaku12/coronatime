<?php

namespace App\Console;

use App\Models\Statistic;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Http;

class Kernel extends ConsoleKernel
{
	/**
	 * Define the application's command schedule.
	 *
	 * @param \Illuminate\Console\Scheduling\Schedule $schedule
	 *
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
		$schedule->call(function () {
			$responseArray = Http::get('https://devtest.ge/countries')->json();

			$data = [];
			foreach ($responseArray as $response)
			{
				extract($response);
				$statistics = Http::post('https://devtest.ge/get-country-statistics', ['code' => $code])->json();
				extract($statistics);
				$data = [
					'country'    => $name,
					'code'       => $code,
					'confirmed'  => $confirmed,
					'recovered'  => $recovered,
					'critical'   => $critical,
					'deaths'     => $deaths,
					'created_at' => $created_at,
					'updated_at' => $updated_at,
				];
				$statistic = Statistic::find($id);
				$statistic->update($data);
			}
		})->daily();
	}

	/**
	 * Register the commands for the application.
	 *
	 * @return void
	 */
	protected function commands()
	{
		$this->load(__DIR__ . '/Commands');

		require base_path('routes/console.php');
	}
}
