<?php

use App\Http\Controllers\CoronatimeController;
use App\Http\Controllers\LanguageController;
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
	Route::get('/worldwide', [CoronatimeController::class, 'show'])->name('worldwide');
	Route::get('/by-country', [CoronatimeController::class, 'showByCountry'])->name('by-country');

	Route::get('/register', [RegisterController::class]);
	Route::get('/login', [SessionsController::class]);
});
Route::get('set-language/{language}', [LanguageController::class, 'index']);
