<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
	public function index()
	{
		return view('session.login');
	}

	public function store()
	{
		$login = request()->input('username');
		$fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		request()->merge([$fieldType => $login]);

		$attributes = request()->validate([
			$fieldType    => $fieldType === 'username' ? 'required|min:3|max:256' : 'required|email',
			'password'    => 'required',
		]);
		if (!auth()->attempt($attributes, ))
		{
			throw ValidationException::withMessages([
				'password' => __('session.Your provided credentials could not be verified.'),
			]);
		}
		session()->regenerate();

		return redirect('/')->with('success', 'Welcome Back!');
	}

	public function destroy()
	{
		auth()->logout();

		return redirect('/')->with('success', 'Goodbye');
	}
}
