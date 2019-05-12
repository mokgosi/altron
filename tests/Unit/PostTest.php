<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
	use WithFaker, RefreshDatabase;

	protected function setUp() : void
    {
        parent::setUp();

        $this->withExceptionHandling();
        $this->user = factory('App\User')->create();
    }

	public function testPostHasAuthor() 
	{
		$post = factory('App\Post')->create(['user_id' => $this->user->id]);

		$this->assertInstanceOf('App\User', $post->user);
	}
}