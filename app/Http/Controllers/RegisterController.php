<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
	public function index(): View
	{
		return view('session.register');
	}

	public function store(): RedirectResponse
	{
		$request = request()->all();
		extract($request);

		$attributes = request()->validate([
			'username'  => 'required|min:3|max:255|unique:users,username',
			'email'     => 'required|email|max:255|unique:users,email',
			'password'  => 'required|min:3|max:255',
		]);
		if ($password !== $repeat_password)
		{
			throw ValidationException::withMessages([
				'repeat_password' => __('session.Passwords do not match!'),
			]);
		}

		$user = User::create([
			'username' => $username,
			'email'    => $email,
			'password' => bcrypt($password),
		]);

		event(new Registered($user));
//		// LOG THE USER IN
		auth()->login($user);

		return redirect('/verify-email');
	}
}
