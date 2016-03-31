<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'AdminController@get_index');
Route::controller('auth', 'AuthController');
Route::controller('product','ProductController');
Route::controller('ajax','AjaxController');

get('pass',function(){
	return bcrypt('112233');
});