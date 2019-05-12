<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTest extends TestCase
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
    public function it_can_create_a_role()
    {
        $attributes = [
            'name' => $this->faker->word,
            'guard_name' => $this->faker->word
        ];

        $this->actingAs($this->user)
            ->post("/roles", $attributes)
            ->assertStatus(302);

        $this->assertDatabaseHas('roles', $attributes);

        $this->actingAs($this->user)
            ->get('/roles')
            ->assertSee($attributes['name']);    
    }

    /** @test */
    public function it_can_delete_a_post()
    {
        $role = factory('App\Role')->create(['name' => 'user','guard_name'=>'web']);

        $this->assertDatabaseHas('roles', ['name'=>$role->name, 'guard_name'=>$role->guard_name]);
        
        $response = $this->actingAs($this->user)
            ->delete("/roles/".$role->id);

        $this->assertEquals(302, $response->getStatusCode());    

    }

    /** @test */
    public function it_can_list_posts()
    {

        $role = factory('App\Role')->create(['name' => 'user','guard_name'=>'web']);

        $this->assertDatabaseHas('roles', ['name' => 'admin','guard_name'=>'web']);
        $this->assertDatabaseHas('roles', ['name' => 'user','guard_name'=>'web']);
        
        $this->actingAs($this->user)
            ->get("/roles")
            ->assertSee($role->name)
            ->assertSee('admin')
            ->assertStatus(200);
    }

    /** @test */
    public function it_can_update_role()
    {

        $role = factory('App\Role')->create(['name' => 'user','guard_name'=>'web']);

        $this->assertDatabaseHas('roles', ['name' => 'user','guard_name'=>'web']);
        
        $this->actingAs($this->user)
            ->put("/roles/".$role->id, ['name' => 'user', 'guard_name' => 'auth'])
            ->assertStatus(302);

        $this->actingAs($this->user)
            ->get("/roles")
            ->assertSee('Edit role successful')
            ->assertStatus(200);    
               
    }

    /** @test */
    public function it_can_show_role() 
    {
        $role = factory('App\Role')->create(['name' => 'user','guard_name'=>'web']);
        
        $this->actingAs($this->user)
            ->get('/roles/'.$role->id)
            ->assertSee($role->name)
            ->assertStatus(200);
    }
}
