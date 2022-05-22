<?php

namespace App\Http\Controllers;

use App\Models\Statistic;

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
		return view('by-country', [
			'statistics'  => Statistic::orderBy(request('sort_by') ?? 'confirmed', request('order_direction') ?? 'DESC')
				->filter(request(['search']))->get(),
		]);
	}
}
