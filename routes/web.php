<?php

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

Route::get('/', function () {
	//    remove !
	if (!auth()->user() === null)
	{
		return redirect('/login');
	}
	return redirect('/worldwide');
});
Route::get('/worldwide', function () {
	return view('index');
})->name('worldwide');
Route::get('/by-country', function () {
	return view('by-country');
})->name('by-country');

Route::get('/register', function () {
	return view('session.register');
});

Route::get('/login', function () {
	return view('session.login');
});
