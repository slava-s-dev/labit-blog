<?php

Route::get('/', function () {
    return view('welcome');
});

Route::pattern('id', '[0-9]+');
Route::pattern('slug', '[a-z0-9-]+');


Route::get('/login', [
	'as' => 'login',
	'uses' => 'LoginController@showIndexPage',
]);

Route::post('/login/auth', [
	'as' => 'auth',
	'uses' => 'LoginController@auth',
]);

Route::get('/logout', [
	'as' => 'logout',
	'uses' => 'LoginController@logout',
]);

Route::get('/blog', [
	'as' => 'blog',
	'uses' => 'BlogController@showIndexPage',
]);

Route::get('/blog/{slug}', [
	'as' => 'blog_post_page',
	'uses' => 'BlogController@showPostPage',
]);

Route::group(['prefix' => '/admin', 'middleware' => ['auth']], function() {

	Route::get('/', [
		'as' => 'admin_index',
		'uses' => 'Admin\AdminController@showIndexPage'
	]);

	Route::get('/posts', [
		'as' => 'admin_posts',
		'uses' => 'Admin\PostController@showList'
	]);

	Route::group(['prefix' => '/post'], function () {
		Route::post('/edit/{id}', [
			'as' => 'admin_post_edit',
			'uses' => 'Admin\PostController@doUpdatePost'
		]);

		Route::post('/add', [
			'as' => 'admin_post_add',
			'uses' => 'Admin\PostController@doCreatePost'
		]);

		Route::post('/delete/{id}', [
			'as' => 'admin_post_delete',
			'uses' => 'Admin\PostController@doDeletePost'
		]);

		Route::get('/edit-page/{id}', [
			'as' => 'admin_post_edit_page',
			'uses' => 'Admin\PostController@showEditPostForm'
		]);

		Route::get('/add-page', [
			'as' => 'admin_post_add_page',
			'uses' => 'Admin\PostController@showCreatePostForm'
		]);
	});

});