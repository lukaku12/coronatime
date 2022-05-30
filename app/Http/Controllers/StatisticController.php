<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StatisticController extends Controller
{
	public function index(): RedirectResponse
	{
		if (!auth()->user())
		{
			return redirect('/login');
		}
		return redirect('/worldwide');
	}

	public function show(): View
	{
		$total_cases = Statistic::sum('confirmed');
		$recovered = Statistic::sum('recovered');
		$deaths = Statistic::sum('deaths');
		return view('index', [
			'total_cases' => $total_cases,
			'recovered'   => $recovered,
			'deaths'      => $deaths,
		]);
	}

	public function showByCountry(): View
	{
		return view('by-country', [
			'statistics'  => Statistic::orderBy(request('sort_by') ?? 'confirmed', request('order_direction') ?? 'DESC')
				->filter(request(['search']))->get(),
		]);
	}
}
