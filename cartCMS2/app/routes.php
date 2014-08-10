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

Route::get('user/create', array('uses' => 'UserController@createUser', 'as' => 'user.create'));
Route::put('user/create', array('uses' => 'UserController@inviteUser', 'as' => 'user.create'));
Route::get('user/invited/{token}', array('uses' => 'UserController@userInvited', 'as' => 'user.invited'));

Route::post('user/registration', array('uses' => 'UserController@userRegistration', 'as' => 'user.registration'));

Route::get('user/edit', array('uses' => 'UserController@editUsers', 'as' => 'user.editUsers'));
Route::get('user/edit/{id}', array('uses' => 'UserController@editUser', 'as' => 'edit.user'));

Route::put('update/users/password/{id}', array('uses' => 'UserController@userUpdateHisPassword', 'as' => 'user.updateHisPassword'));

Route::get('dashboard', array('uses' => 'UserController@dashboard', 'as' => 'user.dashboard'));
Route::get('site/settings', array('uses' => 'SiteSettingsController@edit', 'as' => 'site.settings'));
Route::post('site/settings', array('uses' => 'SiteSettingsController@update', 'as' => 'site.settings'));

Route::get('change/user/rank', array('before' => 'owner' , 'uses' => 'UserController@changeUserRankView', 'as' => 'change.rank'));
Route::put('change/rank/user/id/{id}', array('before' => 'owner', 'uses' => 'UserController@changeUserRank', 'as' => 'update.rank'));

Route::get('user/settings', array('uses' => 'UserController@userSettings', 'as' => 'user.settings'));
Route::put('update/password', array('uses' => 'UserController@updatePassword', 'as' => 'update.password'));
Route::put('update/name', array('uses' => 'UserController@updateName', 'as' => 'update.name'));

Route::post('change/icon', ['uses' => 'UserController@changeIcon', 'as' => 'update.icon']);
Route::get('get/default/icon', ['uses' => 'UserController@defaultIcon', 'as' => 'default.icon']);

Route::get('security/general', array('before' => 'owner', 'uses' => 'SecuritySettingsController@generalEdit', 'as' => 'security.general'));
Route::post('security/general', array('before' => 'owner', 'uses' => 'SecuritySettingsController@generalUpdate', 'as' => 'security.general'));

Route::get('mail/config', array('before' => 'owner', 'uses' => 'MailSettingsController@edit', 'as' => 'mail.config'));
Route::put('mail/config', array('before' => 'owner', 'uses' => 'MailSettingsController@update', 'as' => 'mail.config'));