<?php

namespace Tests\Unit;

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

	public function testUserHasRole() 
	{
		$roles = $this->user->getRoleNames();
		$this->assertEquals('admin', $roles->join(','));
	}
}