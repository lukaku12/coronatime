<?php

namespace App\Http\Controllers;

use App\Models\CoronaStatistics;

class CoronatimeController extends Controller
{
	public function index()
	{
		//    remove !
		if (!auth()->user() === null)
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
