<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

	use refreshdatabase;

	public function test_a_user_has_projects()
	{
		$this->withExceptionHandling();

		$user = factory('App\User')->create();

		$this->assertinstanceOf(Collection::class, $user->projects);
	}
}
