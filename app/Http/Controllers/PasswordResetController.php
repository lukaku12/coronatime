<?php

namespace App\Http\Controllers;

class PasswordResetController extends Controller
{
	public function index()
	{
		return view('session.forgot-password');
	}

	public function show()
	{
		return view('session.reset-password');
	}
}
