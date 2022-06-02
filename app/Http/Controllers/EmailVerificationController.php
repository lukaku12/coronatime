<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class EmailVerificationController extends Controller
{
	public function show(): View | RedirectResponse
	{
		if (auth()->user()->hasVerifiedEmail())
		{
			return redirect('/');
		}
		return view('session.verify-email');
	}

	public function request(): RedirectResponse
	{
		auth()->user()->sendEmailVerificationNotification();

		return back();
	}

	public function verify(EmailVerificationRequest $request): RedirectResponse
	{
		$request->fulfill();

		return redirect('/');
	}
}
