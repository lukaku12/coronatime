<?php

namespace Tests\Feature;

use Tests\TestCase;

class StatisticTest extends TestCase
{
	/*
	 * A basic feature test example.
	 *
	 * @return void
	 */
	/** @test */
	public function this_test_is_temporary_just_to_fill()
	{
		$response = $this->get('/register');

		$response->assertStatus(200);
	}
}
