<?php

namespace App\Http\Controllers;

class LanguageController extends Controller
{
	public function index($language)
	{
		session()->put('language', $language);
		return redirect()->back();
	}
}
