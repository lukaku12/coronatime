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
	Route::get('set-language/{language}', [LanguageController::class, 'index']);

	Route::group(['middleware' => 'guest'], function () {
		Route::get('/register', [RegisterController::class, 'index']);
		Route::post('/register/create', [RegisterController::class, 'store']);

		Route::get('/login', [SessionsController::class, 'index']);
		Route::post('/sessions', [SessionsController::class, 'store']);

		Route::get('forget-password', [PasswordResetController::class, 'showForgetPasswordForm'])->name('forget.password.get');
		Route::post('forget-password', [PasswordResetController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
		Route::get('reset-password/{token}', [PasswordResetController::class, 'showResetPasswordForm'])->name('reset.password.get');
		Route::post('reset-password', [PasswordResetController::class, 'submitResetPasswordForm'])->name('reset.password.post');
	});

	Route::group(['middleware' => 'auth'], function () {
		Route::get('/worldwide', [CoronatimeController::class, 'show'])->middleware('verified')->name('worldwide');
		Route::get('/by-country', [CoronatimeController::class, 'showByCountry'])->middleware('verified')->name('by-country');

		Route::post('/logout', [SessionsController::class, 'destroy']);

		Route::get('/verify-email', [EmailVerificationController::class, 'show'])->name('verification.notice');
		Route::post('/verify-email/request', [EmailVerificationController::class, 'request'])->name('verification.request');
		Route::get('/verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware('signed')->name('verification.verify');
	});
});
