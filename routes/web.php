<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::pattern('id', '[0-9]+');
Route::pattern('slug', '.+');

Route::get('/', [
	'as' => 'public.index.index',
	'uses' => 'IndexController@index'
]);

Route::get('/tin-tuc', [
	'as' => 'public.news.news',
	'uses' => 'NewsController@news'
]);

Route::get('/{slug}-{id}', [
	'as' => 'public.news.cat',
	'uses' =>'NewsController@cat'
]);

Route::get('/{slug}-{id}.html', [
	'as' => 'public.news.detail',
	'uses' =>'NewsController@detail'
]);


Route::group(['namespace' => 'Admin','prefix' => 'admin', 'middleware' => 'auth'], function() {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
	Route::get('index',[
		'as' => 'admin.index.index',
		'uses' => 'IndexController@index'
	]);

	// tin tức
	Route::get('news/index',[
		'as' => 'admin.news.index',
		'uses' => 'NewsController@index'
	]);

	Route::get('news/del/{id}',[
		'as' => 'admin.news.del',
		'uses' => 'NewsController@del'
	]);

	Route::get('news/add',[
		'as' => 'admin.news.add',
		'uses' => 'NewsController@getAdd'
	]);

	Route::post('news/add',[
		'as' => 'admin.news.add',
		'uses' => 'NewsController@postAdd'
	]);

	Route::get('news/edit/{id}',[
		'as' => 'admin.news.edit',
		'uses' => 'NewsController@getEdit'
	]);

	Route::post('news/edit/{id}',[
		'as' => 'admin.news.edit',
		'uses' => 'NewsController@postEdit'
	]);

	// danh mục
	Route::get('cat/index',[
		'as' => 'admin.cat.index',
		'uses' => 'CatController@index'
	]);

	Route::get('cat/add',[
		'as' => 'admin.cat.add',
		'uses' => 'CatController@getAdd'
	]);
	Route::post('cat/add',[
		'as' => 'admin.cat.add',
		'uses' => 'CatController@postAdd'
	]);

	Route::get('cat/del/{id}',[
		'as' => 'admin.cat.del',
		'uses' => 'CatController@del'
	]);

	Route::get('cat/edit/{id}',[
		'as' => 'admin.cat.edit',
		'uses' => 'CatController@getEdit'
	]);
	Route::post('cat/edit/{id}',[
		'as' => 'admin.cat.edit',
		'uses' => 'CatController@postEdit'
	]);


	// users
	Route::get('users/index',[
		'as' => 'admin.users.index',
		'uses' => 'UsersController@index'
	]);

	Route::get('users/add',[
		'as' => 'admin.users.add',
		'uses' => 'UsersController@getAdd'
	]);
	Route::post('users/add',[
		'as' => 'admin.users.add',
		'uses' => 'UsersController@postAdd'
	]);

	Route::get('users/del/{id}',[
		'as' => 'admin.users.del',
		'uses' => 'UsersController@del'
	]);

	Route::get('users/edit/{id}',[
		'as' => 'admin.users.edit',
		'uses' => 'UsersController@getEdit'
	]);
	Route::post('users/edit/{id}',[
		'as' => 'admin.users.edit',
		'uses' => 'UsersController@postEdit'
	]);

});
Route::group(['namespace' => 'Auth','prefix' => 'auth'], function() {
	Route::get('login',[
		'as' => 'auth.auth.login',
		'uses' => 'AuthController@getLogin'
	]);
	Route::post('login',[
		'as' => 'auth.auth.login',
		'uses' => 'AuthController@postLogin'
	]);
	Route::get('logout', [
		'as' => 'auth.logout',
		'uses' => 'AuthController@logout'
	]);
});