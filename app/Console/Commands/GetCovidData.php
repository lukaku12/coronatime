<?php

namespace App\Console\Commands;

use App\Models\Statistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetCovidData extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'get:covid-data';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Get Initial Covid Data and Add it To database';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$this->info('Started Updating Database!');

		$countries = Http::get('https://devtest.ge/countries')->json();

		foreach ($countries as $country)
		{
			$statistics = Http::post('https://devtest.ge/get-country-statistics', ['code' => $country['code']])->json();
			Statistic::updateOrCreate($statistics);
		}

		$this->info('Database Updated Successfully!');
		return 0;
	}
}
