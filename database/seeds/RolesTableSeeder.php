<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
            'created_at' => \Carbon\Carbon::now(),
    		'updated_at' => \Carbon\Carbon::now(),
        ]);

        $admin->givePermissionTo('browse posts','read posts', 'edit posts','add posts','delete posts');
        $admin->givePermissionTo('browse users','read users', 'edit users','add users','delete users');

        $user = Role::create([
            'name' => 'user',
            'guard_name' => 'web',
            'created_at' => \Carbon\Carbon::now(),
    		'updated_at' => \Carbon\Carbon::now(),
        ]);

        $user->givePermissionTo('browse posts','read posts', 'edit posts','add posts');
    }
}
