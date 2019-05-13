<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    protected function setUp() : void
    {
        parent::setUp();

        // $this->withoutExceptionHandling();
        $this->withExceptionHandling();
        $this->user = factory('App\User')->create();
        factory('App\Role')->create(['name' => 'admin','guard_name'=>'web']);
        $this->user->assignRole('admin');
    }

    /** @test */
    public function it_can_create_a_user()
    {
        $user = factory('App\User')->create();

        $this->assertDatabaseHas('users', ['name'=>$user->name, 'email'=>$user->email]);

        $this->actingAs($this->user)
            ->get('/users')
            ->assertSee($user->email);    
    }

    /** @test */
    public function it_can_delete_a_user()
    {
        $user = factory('App\User')->create();

        $this->assertDatabaseHas('users', ['name'=>$user->name, 'email'=>$user->email]);
        
        $response = $this->actingAs($this->user)
            ->delete("/users/".$user->id);

        $this->assertEquals(302, $response->getStatusCode());    

    }

    /** @test */
    public function it_can_list_users()
    {
        $user1 = factory('App\User')->create();
        $user2 = factory('App\User')->create();

        $this->assertDatabaseHas('users', ['name' => $user1->name,'email'=>$user1->email]);
        $this->assertDatabaseHas('users', ['name' => $user2->name,'email'=>$user2->email]);
        
        $this->actingAs($this->user)
            ->get("/users")
            ->assertSee($user1->email)
            ->assertSee($user2->email)
            ->assertStatus(200);
    }

    /** @test */
    public function it_can_update_user()
    {
        $user = factory('App\User')->create();

        $this->assertDatabaseHas('users', ['name' => $user->name,'email'=>$user->email]);
        
        $this->actingAs($this->user)
            ->put("/users/".$user->id, ['name' => 'Updated name'])
            ->assertStatus(302);

        $this->actingAs($this->user)
            ->get("/users")
            ->assertSee('User updated successful')
            ->assertStatus(200);    
    }

    /** @test */
    public function it_can_show_user() 
    {
        $this->actingAs($this->user)
            ->get('/users/'.$this->user->id)
            ->assertSee($this->user->name)
            ->assertStatus(200);
    }
}
