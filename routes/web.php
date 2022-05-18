<?php

use App\Http\Controllers\CoronatimeController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'language'], function () {
	Route::get('/', [CoronatimeController::class, 'index']);
	Route::get('/worldwide', [CoronatimeController::class, 'show'])->middleware(['auth', 'verified'])->name('worldwide');
	Route::get('/by-country', [CoronatimeController::class, 'showByCountry'])->middleware(['auth', 'verified'])->name('by-country');

	Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
	Route::post('/register/create', [RegisterController::class, 'store'])->middleware('guest');

	Route::get('/login', [SessionsController::class, 'index'])->middleware('guest');
	Route::post('/sessions', [SessionsController::class, 'store'])->middleware('guest');
	Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

	// reset password
	Route::get('forget-password', [PasswordResetController::class, 'showForgetPasswordForm'])->name('forget.password.get');
	Route::post('forget-password', [PasswordResetController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
	Route::get('reset-password/{token}', [PasswordResetController::class, 'showResetPasswordForm'])->name('reset.password.get');
	Route::post('reset-password', [PasswordResetController::class, 'submitResetPasswordForm'])->name('reset.password.post');

	// end reset password

	//verify email

	Route::get('/verify-email', [EmailVerificationController::class, 'show'])
		->middleware('auth')
		->name('verification.notice');

	Route::post('/verify-email/request', [EmailVerificationController::class, 'request'])
		->middleware('auth')
		->name('verification.request');

	Route::get('/verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])
		->middleware(['auth', 'signed'])
		->name('verification.verify');
});
Route::get('set-language/{language}', [LanguageController::class, 'index']);
