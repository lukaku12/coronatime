<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
	public function index()
	{
		return view('session.login');
	}
}
