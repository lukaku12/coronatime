<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function store(AuthRequest $request): RedirectResponse
	{
		$fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		$request->merge([$fieldType => $request->username]);

		if (!auth()->attempt(
			[$fieldType => $request->$fieldType, 'password' => $request->password],
			$request->has('remember_device')
		))
		{
			throw ValidationException::withMessages([
				'username' => __('session.your_provided_credentials_could_not_be_verified'),
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
