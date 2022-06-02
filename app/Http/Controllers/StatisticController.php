<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

	public function showByCountry(Request $request): View
	{
		$orderByKey = $request->sort_by ?? 'confirmed';
		$orderByDirection = $request->order_direction ?? 'DESC';
		$world_wide = [
			'world_wide' => 'World Wide',
			'confirmed'  => Statistic::sum('confirmed'),
			'recovered'  => Statistic::sum('recovered'),
			'deaths'     => Statistic::sum('deaths'),
		];

		return view('by-country', [
			'statistics' => Statistic::orderBy($orderByKey, $orderByDirection)
				->filter(request(['search']))->get(),
			'world_wide' => $world_wide,
		]);
	}
}
