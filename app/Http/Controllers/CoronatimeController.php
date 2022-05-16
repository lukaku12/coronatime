<?php

namespace App\Http\Controllers;

use App\Models\CoronaStatistics;
use App\Models\CovidCountry;
use Illuminate\Support\Facades\Http;

class CoronatimeController extends Controller
{
	public function index()
	{
		if (!auth()->user())
		{
			return redirect('/login');
		}
		return redirect('/worldwide');
	}

	public function show()
	{
		$countryStatistics = CovidCountry::all();
		$total_cases = 0;
		$recovered = 0;
		$deaths = 0;
		foreach ($countryStatistics as $countryStatistic)
		{
			$total_cases += $countryStatistic->confirmed;
			$recovered += $countryStatistic->recovered;
			$deaths += $countryStatistic->deaths;
		}
		return view('index', [
			'total_cases' => $total_cases,
			'recovered'   => $recovered,
			'deaths'      => $deaths,
		]);
	}

	public function showByCountry()
	{
//		$responseArray = Http::get('https://devtest.ge/countries')->json();
//		foreach ($responseArray as $response)
//		{
//			extract($response);
//
//			CoronaStatistics::create([
//				'code' => $code,
//				'name' => $name,
//			]);
//		}
//		$indexes = CoronaStatistics::all();
//		foreach ($indexes as $index)
//		{
//			$response = Http::post('https://devtest.ge/get-country-statistics', ['code' => $index->code])->json();
//			CovidCountry::create($response);
//		}
		$statistics = CoronaStatistics::all();
		$countryStatistics = CovidCountry::all();
		return view('by-country', [
			'statistics'         => $statistics,
			'countryStatistics'  => $countryStatistics,
		]);
	}
}
