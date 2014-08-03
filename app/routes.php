<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'index', 'uses' => 'StaticController@index'));
Route::get('home', array('as' => 'home', 'uses' => 'StaticController@index'));
Route::get('about', array('as' => 'about', 'uses' => 'StaticController@about'));
Route::get('contact', array('as' => 'contact', 'uses' => 'StaticController@contact'));
Route::get('committee', array('as' => 'committee', 'uses' => 'StaticController@committee'));


Route::resource('news', 'NewsController');

Route::resource('gallery', 'AlbumController');
Route::get('gallery/{albumId}/photos', 'AlbumPhotosController@show');
Route::resource('albumPhotos', 'AlbumPhotosController');

// Admin Routes

Route::get('admin/login', array(
	'as' => 'admin_login',
	'uses' => 'UsersController@getLogin'
));


Route::post('admin/login', array(
	'as' => 'post_admin_login',
	'uses' => 'UsersController@postLogin'
));