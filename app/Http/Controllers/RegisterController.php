<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
	public function store(RegisterRequest $request): RedirectResponse
	{
		if ($request->password !== $request->repeat_password)
		{
			throw ValidationException::withMessages([
				'password'        => __('session.passwords_do_not_match'),
				'repeat_password' => __('session.passwords_do_not_match'),
			]);
		}

		$user = User::create([
			'username' => $request->username,
			'email'    => $request->email,
			'password' => bcrypt($request->password),
		]);

		event(new Registered($user));
		auth()->login($user);

		return redirect('/verify-email');
	}
}
