<?php

namespace Tests\Feature;

use Tests\TestCase;

class LangugageTest extends TestCase
{
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function test_user_can_change_apps_local_language()
	{
		$this->withoutExceptionHandling();
		$this->withMiddleware();
		$this->get('/set-language/en')->assertStatus(302)->assertSessionHas('language', 'en');
	}
}
