<?php

namespace App\Console\Commands;

use App\Models\Statistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateCovidData extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'update:covid-data';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Update Database From Api EveryDay';

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
			$statistic = Statistic::find($statistics['id']);
			$statistic->update([
				'id'         => $statistics['id'],
				'country'    => $country['name'],
				'code'       => $statistics['code'],
				'confirmed'  => $statistics['confirmed'],
				'recovered'  => $statistics['recovered'],
				'critical'   => $statistics['critical'],
				'deaths'     => $statistics['deaths'],
				'created_at' => $statistics['created_at'],
				'updated_at' => $statistics['updated_at'],
			]);
		}

		$this->info('Database Updated Successfully!');
		return 0;
	}
}
