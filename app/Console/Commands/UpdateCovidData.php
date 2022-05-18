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
	protected $signature = 'update:data';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$countries = Http::get('https://devtest.ge/countries')->json();

		$data = [];
		foreach ($countries as $country)
		{
			extract($country);
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
		$this->info('Database Updated Successfully');
		return 0;
	}
}
