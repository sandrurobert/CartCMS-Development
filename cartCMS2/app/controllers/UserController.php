<?php

class UserController extends \BaseController {


	public function __construct()
	{
		$this->beforeFilter('auth', array("except" => array("loginPage", "recoverPassword", "login")));
	}

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

	/**
	 * Pending user function
	 */
	public function storePendingUser() {
		if(Auth::user()->hasRole('Owner') || Auth::user()->hasRole('Admin')){

			$user = new PendingUser;
			$user['email'] = Input::get('email');
			$user['account_rank'] = Input::get('rank');
			$user['register_token'] = str_random(56);
			$user['creator_user_id'] = Auth::user()->id;

			$user->save();

			return Redirect::route('user.dashboard');
		}

		return Redirect::route('user.dashboard');
	}


	/**
	 * Change user rank
	 */
	public function changeUserRank($id){

		$rank_id = Input::get('rank_id');
		$user = User::find($id);
		$user->roles->first()->role_id = $rank_id;

		$rank = 

		DB::table('assigned_roles')
            ->where('user_id', $id)
            ->update(array('role_id' => $rank_id));

        $rank = $user->rankName($user->id);
        $email = $user->email;

        $lang_resource = Lang::get('notifications.changeUserRank.success', array('email' => $email, 'rank' => $rank) );
		$notification['green'] = $lang_resource;

		return Redirect::route('change.rank')->with('notification', $notification);

	}

	/**
	 * View for Change user rank
	 */
	public function changeUserRankView() {

		$users = User::all();
		$ranks = Role::all();
		$ranks = $ranks->lists('name', 'id');

		return View::make('user_settings.change_rank')->with('users', $users)->with('ranks', $ranks);
	}

	/**
	 * View for User global settings
	 */

	public function userSettings() {

		$id = Auth::user()->id;
		$user = User::find($id);
		return View::make('user_settings.user_settings')->with('user', $user);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 */
	public function updatePassword() {

		$id = Auth::user()->id;
		$user = User::find($id);
		$input = Input::all();
		$pwLenght = 5;
		/**
		 * Updating the password, if the test passes
		 */
		if (Hash::check($input['old_pass'], $user->password) && $input['new'] == $input['new2'])
		{

			/**
			 * Let's check the password's lenght
			 */
			if(mb_strlen($input['new']) < $pwLenght){
			    $lang_resource = Lang::get('notifications.changePass.lenght', array('lenght' => $pwLenght));
			    $notification['red'] = $lang_resource;
			    return Redirect::route('user.settings')->with('notification', $notification);
			}
		    $user->password = Hash::make($input['new']);
		    $user->update();

		    $lang_resource = Lang::get('notifications.changePass.success', array('name' => Auth::user()->first_name));
		    $notification['green'] = $lang_resource;
		    return Redirect::route('user.settings')->with('notification', $notification);
		}

		/**
		 * In case of fail, it should return the following message:
		 *
		 * ---
		 * :name, something went wrong! Maybe the passwords did not match! Try again or ask for support at contact center!
		 * ---
		 */
		$lang_resource = Lang::get('notifications.changePass.danger', array('name' => Auth::user()->first_name));
		$notification['red'] = $lang_resource;
		return Redirect::route('user.settings')->with('notification', $notification);
	}

	public function updateName() {

		$id = Auth::user()->id;
		$user = User::find($id);
		$input = Input::all();

		if($input['first_name'] != '' && $input['last_name'] != '') {
			$user->first_name = $input['first_name'];
			$user->last_name = $input['last_name'];
			$user->update();

			return Redirect::route('user.settings');

		    $lang_resource = Lang::get('notifications.changePass.success', array('name' => Auth::user()->first_name));
		    $notification['green'] = $lang_resource;
		    return Redirect::route('user.settings', Auth::user()->id)->with('notification', $notification);

		}

		$lang_resource = Lang::get('notifications.changePass.danger', array('name' => Auth::user()->first_name));
		$notification['red'] = $lang_resource;
		return Redirect::route('user.settings', Auth::user()->id)->with('notification', $notification);
	}

	public function defaultIcon() {

		$user = User::find(Auth::user()->id);
		$icon = Input::file('icon');
		$icon_id = $user->icon->id;

		$avatar = Icon::find($icon_id);
		$avatar->icon_url = 'avt/default.jpg';
		$avatar->update();

		return Redirect::route('user.settings');

	}

	public function changeIcon() {

		$user = User::find(Auth::user()->id);
		$icon = Input::file('icon');
		$icon_id = $user->icon->id;

		if($user->isImage($icon)){
			$path = $user->uploadIcon($icon);

			$avatar = Icon::find($icon_id);
			$old_avatar = $avatar;
			$avatar->icon_url = $path;
			$avatar->update();
		}

		return Redirect::route('user.settings');
	}


}