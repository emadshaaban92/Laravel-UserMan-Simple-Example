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
Route::any('/',       array('as' => 'index',       'uses' => 'HomeController@showWelcome'));

Route::get('logout',  array('as' => 'logout',      'uses' => 'App\Controllers\AuthController@getLogout'));
Route::get('login',   array('as' => 'login',       'uses' => 'App\Controllers\AuthController@getLogin'));
Route::post('login',  array('as' => 'login.post',  'uses' => 'App\Controllers\AuthController@postLogin'));
Route::get('register',   array('as' => 'register',       'uses' => 'App\Controllers\AuthController@getRegister'));
Route::post('register',  array('as' => 'register.post',  'uses' => 'App\Controllers\AuthController@postRegister'));

Route::group(array('prefix' => 'member', 'before' => 'auth.sentry'), function()
{
	Route::any('/',   array('as' => 'MemberHome',   'uses' =>  'HomeController@membersOnly'));
	
});
