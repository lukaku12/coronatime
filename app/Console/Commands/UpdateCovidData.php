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
	protected $description = 'Update Database From Api EveryDay';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$countries = Http::get('https://devtest.ge/countries')->json();

		foreach ($countries as $country)
		{
			extract($country);
			$statistics = Http::post('https://devtest.ge/get-country-statistics', ['code' => $code])->json();
			extract($statistics);
			$statistic = Statistic::find($id);
			$statistic->update($statistics);
		}
		$this->info('Database Updated Successfully');
		return 0;
	}
}
