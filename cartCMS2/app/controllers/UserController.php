<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function loginPage()
	{
		return View::make('login');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /user/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$pass1 = $input['password'];
		$pass2 = $input['password2'];
		$email = $input['email'];

		if( $pass1 != $pass2){
			return Redirect::route('user.create');
		} 

		$user = new User;
		$user->email = $email;
		$user->password = Hash::make($pass1);
		$user->first_name = $input['first_name'];
		$user->last_name = $input['last_name'];
		$user->save();
	}

	/**
	 * Display the specified resource.
	 * GET /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /user/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
        return View::make('user.edit')->with('user', $user);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Login procces
	 * Check email and password
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function login()
	{	$input = Input::all();
		if(!Auth::attempt(array('email' => $input['username'], 'password' => $input['password'])))
		{
			$lang_resource = Lang::get('notifications.login.danger');
			$notification['red'] = $lang_resource;
			return View::make('login')->with('notification', $notification);
		}
			$lang_resource = Lang::get('notifications.login.success', array('name' => Auth::user()->first_name) );
			$notification['green'] = $lang_resource;
			return Redirect::route('user.dashboard')->with('notification', $notification);
	}

	/**
	 * Logout Function
	 * @return Logout
	 */
	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updatePassword($id)
	{
			$input = Input::all();
			if($input['new_password'] != $input['new_password_2'])
			{
					return Redirect::route('user.edit');
			}
			$user = User::find($id);
			$user->password = Hash::make($input['new_password']);
			$user->update();
	}

	/**
	 * Password recover function
	 */
	public function recoverPassword(){
		return View::make('login');
	}

	/**
	 * User Dashboard
	 */
	public function dashboard(){
		return View::make('dashboard');
	}
}