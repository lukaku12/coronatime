<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\SubmitPasswordResetRequest;
use Illuminate\Contracts\View\View;
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

	public function submitForgetPasswordForm(PasswordResetRequest $request): View
	{
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

	public function submitResetPasswordForm(SubmitPasswordResetRequest $request): View
	{
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
