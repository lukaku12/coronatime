<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
	public function index($language): RedirectResponse
	{
		session()->put('language', $language);
		return redirect()->back();
	}
}
