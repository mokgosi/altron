<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostApiTest extends TestCase
{
	use WithFaker, RefreshDatabase;

    public function testPostsAreListedCorrectly()
    {
    	$this->user = factory('App\User')->create();

        $post1 = factory('App\Post')->create(['user_id'=>$this->user->id]);
        $post2 = factory('App\Post')->create(['user_id'=>$this->user->id]);

        $this->assertDatabaseHas('posts', ['title'=>$post1->title, 'body'=>$post1->body, 'user_id' => $post1->user_id]);
        $this->assertDatabaseHas('posts', ['title'=>$post2->title, 'body'=>$post2->body, 'user_id' => $post1->user_id]);
        
        $this->json('GET', '/api/v1/posts')
            ->assertStatus(200)
            ->assertJson([
                [ 'title' => $post1->title, 'body' => $post1->body, 'user_id' => $this->user->id],
                [ 'title' => $post2->title, 'body' => $post2->body, 'user_id' => $this->user->id]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'title', 'body', 'user_id', 'created_at', 'updated_at'],
            ]);	
    }
}