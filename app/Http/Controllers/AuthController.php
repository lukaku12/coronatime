<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function store(AuthRequest $request): RedirectResponse
	{
		if (!auth()->attempt($request->except('_token'), $request->has('remember_device')))
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
