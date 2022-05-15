<?php

use App\Http\Controllers\CoronatimeController;
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
	Route::get('/worldwide', [CoronatimeController::class, 'show'])->middleware('auth')->name('worldwide');
	Route::get('/by-country', [CoronatimeController::class, 'showByCountry'])->middleware('auth')->name('by-country');

	Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
	Route::post('/register/create', [RegisterController::class, 'store'])->middleware('guest');

	Route::get('/login', [SessionsController::class, 'index'])->middleware('guest');
	Route::post('/sessions', [SessionsController::class, 'store'])->middleware('guest');
	Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

	Route::get('/forgot-password', [PasswordResetController::class, 'index'])->middleware('guest');
	// add token slug
	Route::get('/reset-password', [PasswordResetController::class, 'show'])->middleware('guest');
});
Route::get('set-language/{language}', [LanguageController::class, 'index']);
