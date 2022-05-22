<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PasswordResetController extends Controller
{
	public function showForgetPasswordForm(): View
	{
		return view('session.forgot-password');
	}

	public function submitForgetPasswordForm(Request $request): View
	{
		$request->validate([
			'email' => 'required|email|exists:users',
		]);
		session()->put('email', $request->email);

		$token = Str::random(64);

		DB::table('password_resets')->insert([
			'email'      => $request->email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);

		Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
			$message->to($request->email);
			$message->subject('Reset Password');
		});

		return view('session.sent-email-to-reset-password');
	}

	public function showResetPasswordForm($token): View
	{
		return view('session.reset-password', ['token' => $token]);
	}

	public function submitResetPasswordForm(Request $request): View
	{
		$request->validate([
			'password'              => 'required|min:6',
			'password_confirmation' => 'required',
		]);
		if ($request->password !== $request->password_confirmation)
		{
			{
				throw ValidationException::withMessages([
					'password_confirmation' => 'Passwords Do Not Match!',
				]);
			}
		}

		$updatePassword = DB::table('password_resets')
			->where([
				'email' => $request->session()->get('email'),
				'token' => $request->token,
			])
			->first();

		if (!$updatePassword)
		{
			{
				throw ValidationException::withMessages([
					'password_confirmation' => __('Invalid Token'),
				]);
			}
		}

		$user = User::where('email', $request->session()->get('email'))
			->update(['password' => bcrypt($request->password)]);

		DB::table('password_resets')->where(['email'=> $request->session()->get('email')])->delete();

		return view('session.password-has-been-updated');
	}
}
