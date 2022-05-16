<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
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
		$statistics = Statistic::all();
		$total_cases = 0;
		$recovered = 0;
		$deaths = 0;
		foreach ($statistics as $statistic)
		{
			$total_cases += $statistic->confirmed;
			$recovered += $statistic->recovered;
			$deaths += $statistic->deaths;
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
//
//		$data = [];
//		foreach ($responseArray as $response)
//		{
//			extract($response);
//			$statistics = Http::post('https://devtest.ge/get-country-statistics', ['code' => $code])->json();
//			extract($statistics);
//			$data = [
//				'id'         => $id,
//				'country'    => $name,
//				'code'       => $code,
//				'confirmed'  => $confirmed,
//				'recovered'  => $recovered,
//				'critical'   => $critical,
//				'deaths'     => $deaths,
//				'created_at' => $created_at,
//				'updated_at' => $updated_at,
//			];
//			Statistic::create($data);
//		}
		return view('by-country', [
			'statistics'  => Statistic::all(),
		]);
	}
}
