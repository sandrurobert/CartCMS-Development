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

Route::get('/', array('uses' => 'UserController@loginPage', 'as' => 'login.page'));


Route::get('login', array('uses' => 'UserController@loginPage', 'as' => 'login.page'));

Route::post('user/login', array('uses' => 'UserController@login', 'as' => 'user.login'));
Route::get('user/recover', array('uses' => 'UserController@recoverPassword', 'as' => 'user.recover'));
Route::get('user/logout', array('uses' => 'UserController@logout', 'as' => 'user.logout'));


Route::get('dashboard', array('uses' => 'UserController@dashboard', 'as' => 'user.dashboard'));