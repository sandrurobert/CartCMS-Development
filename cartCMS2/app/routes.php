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
Route::put('update/users/name/{id}', array('uses' => 'UserController@userUpdateHisName', 'as' => 'user.updateHisName'));
Route::post('update/users/icon/{id}', array('uses' => 'UserController@userUpdateHisIcon', 'as' => 'user.updateHisIcon'));

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
Route::get('mail/config/default/values', array('before' => 'owner', 'uses' => 'MailSettingsController@defaultValues', 'as' => 'mail.config.default.values'));

//Tasks
Route::get('task/create', array('before' => 'owner', 'uses' => 'TasksController@create', 'as' => 'task.create'));
Route::post('task/create', array('before' => 'owner', 'uses' => 'TasksController@store', 'as' => 'task.store'));
Route::get('task/{id}/edit', array('before' => 'owner', 'uses' => 'TasksController@edit', 'as' => 'task.edit'));
Route::put('task/{id}/edit', array('before' => 'owner', 'uses' => 'TasksController@update', 'as' => 'task.update'));
Route::get('task/all', array('before' => 'owner', 'uses' => 'TasksController@index', 'as' => 'task.index'));
Route::get('task/show/{id}', array('before' => 'auth', 'uses' => 'TasksController@show', 'as' => 'task.show'));
Route::get('task/delete/{id}', array('before' => 'owner','uses' => 'TasksController@destroy', 'as' => 'task.destroy'));
Route::get('my/tasks', array('before' => 'auth', 'uses' => 'TasksController@myTasks', 'as' => 'my.tasks'));
Route::get('mark/task/complete/{id}', array('before' => 'auth', 'uses' => 'TasksController@completeTask', 'as' => 'task.complete'));

//Task types

Route::get('task/type/create', array('before' => 'owner', 'uses' => 'TaskTypeController@create', 'as' => 'task_type.create'));
Route::post('task/type/create', array('before' => 'owner', 'uses' => 'TaskTypeController@store', 'as' => 'task_type.store'));
Route::get('task/type/{id}/edit', array('before' => 'owner', 'uses' => 'TaskTypeController@edit', 'as' => 'task_type.edit'));
Route::put('task/type/{id}/edit', array('before' => 'owner', 'uses' => 'TaskTypeController@update', 'as' => 'task_type.update'));
Route::get('task/type/delete/{id}', array('before' => 'owner', 'uses' => 'TaskTypeController@destroy', 'as' => 'task_type.destroy'));
Route::get('task/type/all', array('before' => 'owner', 'uses' => 'TaskTypeController@index', 'as' => 'task_type.index'));

//Tasks Count
Route::get('user/tasks/counter', array('uses' => 'TasksController@countTasksForUser', 'as' => 'tasks.count'));
Route::get('user/tasks', array('uses' => 'TasksController@userTasks', 'as' => 'user.tasks'));
//