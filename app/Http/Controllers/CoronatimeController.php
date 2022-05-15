<?php

namespace App\Http\Controllers;

use App\Models\CoronaStatistics;

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
		return view('index');
	}

	public function showByCountry()
	{
		$statistics = CoronaStatistics::all();
		return view('by-country', [
			'statistics' => $statistics,
		]);
	}
}
