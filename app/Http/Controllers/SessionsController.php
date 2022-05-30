<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
	public function index(): View
	{
		return view('session.login');
	}

	public function store(Request $request): RedirectResponse
	{
		$login = $request->input('username');
		$fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		$request->merge([$fieldType => $login]);

		$attributes = $request->validate([
			$fieldType    => $fieldType === 'username' ? 'required|min:3|max:256' : 'required|email',
			'password'    => 'required',
		]);
		if (!auth()->attempt($attributes, $request->has('remember_device')))
		{
			throw ValidationException::withMessages([
				'password' => __('session.your_provided_credentials_could_not_be_verified'),
			]);
		}
		session()->regenerate();

		return redirect('/')->with('success', 'Welcome Back!');
	}

	public function destroy(): RedirectResponse
	{
		auth()->logout();

		return redirect('/')->with('success', 'Goodbye');
	}
}
