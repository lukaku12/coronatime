<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageMiddleware
{
	public function handle(Request $request, Closure $next)
	{
		$language = Session::get('language');
		if ($language)
		{
			app()->setLocale($language);
		}
		else
		{
			app()->setLocale('ka');
		}

		return $next($request);
	}
}
