<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([[
            'name' => 'browse posts',
            'guard_name' => 'web',
            'created_at' => \Carbon\Carbon::now(),
    		'updated_at' => \Carbon\Carbon::now(),
        ],[
    		'name' => 'read posts',
            'guard_name' => 'web',
    		'created_at' => \Carbon\Carbon::now(),
    		'updated_at' => \Carbon\Carbon::now(),
        ],[
    		'name' => 'edit posts',
            'guard_name' => 'web',
    		'created_at' => \Carbon\Carbon::now(),
    		'updated_at' => \Carbon\Carbon::now(),
        ],[
    		'name' => 'add posts',
            'guard_name' => 'web',
    		'created_at' => \Carbon\Carbon::now(),
    		'updated_at' => \Carbon\Carbon::now(),
        ],[
            'name' => 'delete posts',
            'guard_name' => 'web',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ],[
            'name' => 'browse users',
            'guard_name' => 'web',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ],[
            'name' => 'read users',
            'guard_name' => 'web',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ],[
            'name' => 'edit users',
            'guard_name' => 'web',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ],[
            'name' => 'add users',
            'guard_name' => 'web',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ],[
            'name' => 'delete users',
            'guard_name' => 'web',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]]);
    }
}
