<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    protected function setUp() : void
    {
        parent::setUp();

        // $this->withoutExceptionHandling();
        $this->withExceptionHandling();
        $this->user = factory('App\User')->create();
    }

    /** @test */
    public function it_can_create_a_post()
    {
        $attributes = [
            'title' => $this->faker->word,
            'body' => $this->faker->paragraph,
            'user_id' => 1,
        ];


        $this->actingAs($this->user)
            ->post("/posts", $attributes)
            ->assertStatus(302);
            // ->assertJsonStructure(array_keys($attributes), $attributes);

        $this->assertDatabaseHas('posts', $attributes);
        $this->get('/posts')->assertSee($attributes['title']);    
    }

    /** @test */
    public function it_can_delete_a_post()
    {
        $post = factory('App\Post')->create(['user_id'=>$this->user->id]);

        $this->assertDatabaseHas('posts', ['title'=>$post->title, 'body'=>$post->body, 'user_id' => $post->user_id]);
        
        $response = $this->actingAs($this->user)
            ->delete("/posts/".$post->id);

        $this->assertEquals(302, $response->getStatusCode());    

    }

    /** @test */
    public function it_can_list_posts()
    {
        $post = factory('App\Post')->create(['user_id'=>$this->user->id]);
        $post1 = factory('App\Post')->create(['user_id'=>$this->user->id]);
        $post2 = factory('App\Post')->create(['user_id'=>$this->user->id]);

        $this->assertDatabaseHas('posts', ['title'=>$post->title, 'body'=>$post->body, 'user_id' => $post->user_id]);
        $this->assertDatabaseHas('posts', ['title'=>$post1->title, 'body'=>$post1->body, 'user_id' => $post1->user_id]);
        $this->assertDatabaseHas('posts', ['title'=>$post2->title, 'body'=>$post2->body, 'user_id' => $post2->user_id]);
        
        $this->actingAs($this->user)
            ->get("/posts")
            ->assertSee($post->title)
            ->assertSee($post1->title)
            ->assertSee($post2->title)
            ->assertStatus(200);
    }

    /** @test */
    public function it_can_update_post()
    {
        $post = factory('App\Post')->create(['user_id'=>$this->user->id]);

        $this->assertDatabaseHas('posts', ['title'=>$post->title, 'body'=>$post->body, 'user_id' => $post->user_id]);
        
        $update = $this->actingAs($this->user)
            ->put("/posts/".$post->id, ['title' => 'Updated Title'])
            ->assertStatus(302);

        $this->actingAs($this->user)
            ->get("/posts/".$post->id)
            ->assertSee($post->title)
            ->assertStatus(200);        
    }

    /** @test */
    public function it_can_show_post() 
    {
        $post = factory('App\Post')->create(['user_id'=>$this->user->id]);
        
        $this->actingAs($this->user)
            ->get('/posts/'.$post->id)
            ->assertSee($post->title)
            ->assertStatus(200);
    }
}
