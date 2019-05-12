<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserApiTest extends TestCase
{
	use WithFaker, RefreshDatabase;

    public function testUsersAreListedCorrectly()
    {
        $user1 = factory('App\User')->create();
        $user2 = factory('App\User')->create();

        $this->assertDatabaseHas('users', ['name'=>$user1->name, 'email'=>$user1->email]);
        $this->assertDatabaseHas('users', ['name'=>$user2->name, 'email'=>$user2->email]);
        
        $this->json('GET', '/api/v1/users')
            ->assertStatus(200)
            ->assertJson([
                ['name'=>$user1->name, 'email'=>$user1->email],
                ['name'=>$user2->name, 'email'=>$user2->email]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'name', 'email', 'password', 'email_verified_at', 'created_at', 'updated_at'],
            ]);	
    }
}