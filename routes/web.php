<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	$posts = \App\Post::with('user')->orderBy('id', 'Desc')->get();
        // return view('posts.index', compact('posts'));
    return view('welcome', compact('posts'));
});

Route::get('/post/{id}', function ($id) {
	$post = \App\Post::find($id);
    return view('post', compact('post'));
})->name('post');

// Route::middleware('auth')->group(function () {
    Route::resource('/users', 'UserController');
	Route::resource('/posts', 'PostController');
	Route::resource('/roles', 'RoleController');
// });



Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
