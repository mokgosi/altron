<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret')
        ]);
        $admin->assignRole('admin');
        $admin->assignRole('user');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@admin.com',
            'password' => Hash::make('secret')
        ]);
        $user->assignRole('user');

        factory(App\User::class, 5)->create()->each(function ($user) {
        	$user->posts()->save(factory(App\Post::class)->make());
            $user->assignRole('user');
    	});
    }
}
