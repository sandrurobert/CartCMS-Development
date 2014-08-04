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
Route::get('site/settings', array('uses' => 'SiteSettingsController@edit', 'as' => 'site.settings'));
Route::post('site/settings', array('uses' => 'SiteSettingsController@update', 'as' => 'site.settings'));

Route::get('change/user/rank', array('uses' => 'UserController@changeUserRankView', 'as' => 'change.rank'));
Route::put('change/rank/user/id/{id}', array('uses' => 'UserController@changeUserRank', 'as' => 'update.rank'));

Route::get('user/global/settings/{id}', array('uses' => 'UserController@globalSettings', 'as' => 'global.settings'));
Route::put('update/password/{id}', array('uses' => 'UserController@updatePassword', 'as' => 'update.password'));