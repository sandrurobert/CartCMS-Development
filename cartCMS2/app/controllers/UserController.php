<?php

class UserController extends \BaseController {


	public function __construct()
	{
		$this->beforeFilter('auth', array("except" => array("loginPage", "recoverPassword", "login", "userInvited", "userRegistration")));

		Sessions::checkIdleUsers();
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
		if(Auth::check()){return Redirect::route('user.dashboard');}
		return View::make('login');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /user/create
	 *
	 * @return Response
	 */
	public function createUser()
	{
		return View::make('user_settings/user_create');
	}

	/**
	 * Sends an email with a token
	 * Used for inviting staff
	 * PUT /user/create
	 *
	 * @return Response
	 */
	public function inviteUser()
	{
		$input = Input::All();

		$userTo = User::where('email', '=', $input['email'])->first();

		if(!empty($userTo)){
			$emailOwner = new User;
			$emailOwner = $emailOwner->getUserFullname($userTo->id);

			$notification['red'] = INot::not('notifications.sendInvitationEmailExists.danger', ['name' => $emailOwner]);
			return Redirect::route('user.create')->with('notification', $notification);
		}

		$data['email'] = $input['email'];
		$data['subject'] = "You we're invited to join CartCMS!";

		$user = Auth::user();
		$rankName = $user->getRankName($input['rank']);


		if($input['email'] != ''){
			$message['email'] = $data['email'];
			$message['welcome'] = "tiganiii";
			$message['rank'] = $rankName;
			$message['token'] = str_random(40);
			Mail::send('emails.welcome', $message, function($message) use ($data)
			{
			    $message->to($data['email'])->subject($data['subject']);
			});

			$PendingUser = new PendingUser;
			$PendingUser->email = $data['email'];
			$PendingUser->register_token = $message['token'];
			$PendingUser->account_rank = $input['rank'];
			$PendingUser->creator_user_id = Auth::user()->id;
			$PendingUser->save();

			$notification['green'] = INot::not('notifications.sendInvitationEmailExists.danger', ['name' => Auth::user()->first_name, 'email' => $input['email'], 'rank' => $rankName]);
			return Redirect::route('user.create')->with('notification', $notification);
		}

		$notification['red'] = INot::not('notifications.sendInvitationEmailExists.danger', ['name' => Auth::user()->first_name]);
		return Redirect::route('user.create')->with('notification', $notification);
	}

	/**
	 * Verifying the token
	 */

	public function userInvited($token){
		$userP = new PendingUser;
		$userM = new User;
		$response = $userP->verifyToken($token); // Boolean variable

		if($response){
			$user = $userP->getAllPendingData($token);
			$invitedBy = $userM->getUserFullname($user->creator_user_id);

			$notification['green'] = INot::not('notifications.registration.arrival', ['name' => $invitedBy]);
			return View::make('user_settings/user_registration')->with('user', $user)->with('notification', $notification);
		}

		else{
			$notification['red'] = INot::not('notifications.token.danger');
			return View::make('error')->with('notification', $notification);
		}
	}

	/**
	 * Finally, when the token verifying is over,
	 * the user will be able to register
	 */

	public function userRegistration(){
		$input = Input::all();
		$userP = new PendingUser;
		$response = $userP->verifyToken($input['token']); // Boolean variable


		if(!$response){
			$notification['red'] = INot::not('notifications.token.danger');
			return View::make('error')->with('notification', $notification);
		}


		$userPendingData = $userP->getAllPendingData($input['token']);

		$user['email']				= $userPendingData->email;
		$user['rank']				= $userPendingData->account_rank;
		$user['first_name'] 		= $input['first_name'];
		$user['last_name'] 			= $input['last_name'];
		$user['newpass'] 			= $input['newpass'];
		$user['newpassagain']		= $input['newpassagain'];

		if(empty($user['email']) ||
			empty($user['first_name']) ||
			 empty($user['last_name']) ||
			  empty($user['newpass']) ||
			   empty($user['newpassagain']) ||
			    empty($user['rank']) ){

				$lang_resource = Lang::get('notifications.all_fields_are_important');
				$notification['red'] = $lang_resource;
				return Redirect::route('user.invited', $userPendingData->register_token)->with('user', $userPendingData)->with('notification', $notification);
		}

		if($user['newpass'] != $user['newpassagain']){
			$notification['red'] = INot::not('notifications.regPass.danger');
			return Redirect::route('user.invited', $userPendingData->register_token)->with('user', $userPendingData)->with('notification', $notification);
		}

		$pwConfig = new SecuritySettings;
		$lenght = $pwConfig->find(1);

		if(mb_strlen($user['newpass']) < $lenght->min_pw_lenght){
			$notification['red'] = INot::not('notifications.changePass.lenght', ['lenght' => $lenght->min_pw_lenght]);
			return Redirect::route('user.invited', $userPendingData->register_token)->with('user', $userPendingData)->with('notification', $notification);
		}


		$new_user = new User;
		$new_user->email 			= $user['email'];
		$new_user->password 		= Hash::make($user['newpass']);
		$new_user->first_name 	    = $user['first_name'];
		$new_user->last_name 	    = $user['last_name'];
		$new_user->save();

		$avatar = new Icon;
		$avatar->user_id = $new_user->id;
		$avatar->save();


		PendingUser::where('register_token', '=', $userPendingData->register_token)->first()->delete();

		$new_role_asign = new AssignedRoles;
		$new_role_asign->user_id = $new_user->id;
		$new_role_asign->role_id = $user['rank'];
		$new_role_asign->save();

		$notification['green'] = INot::not('notifications.regSuccess', ['name' => $user['first_name'], 'email' => $user['email']]);
		return Redirect::route('login.page')->with('notification', $notification);
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
			$notification['red'] = INot::not('notifications.login.danger');
			return View::make('login')->with('notification', $notification);
		}

			$notification['green'] = INot::not('notifications.login.success', ['name' => Auth::user()->first_name]);
			return Redirect::route('user.dashboard')->with('notification', $notification);
	}

	/**
	 * Logout Function
	 * @return Logout
	 */
	public function logout()
	{
		Sessions::deleteUser();

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
		Sessions::updateUser();

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

		DB::table('assigned_roles')
            ->where('user_id', $id)
            ->update(array('role_id' => $rank_id));

        $rank = $user->rankName($user->id);
        $email = $user->email;

		$notification['green'] = INot::not('notifications.changeUserRank.success', ['email' => $email, 'rank' => $rank]);

		return Redirect::route('change.rank')->with('notification', $notification);

	}

	/**
	 * View for Change user rank
	 */
	public function changeUserRankView() {
		Session::flush();
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
		$pwConfig = ['lenght' => DB::table('security_settings')->lists('min_pw_lenght')];
		/**
		 * Updating the password, if the test passes
		 */
		if (Hash::check($input['old_pass'], $user->password) && $input['new'] == $input['new2'])
		{

			/**
			 * Let's check the password's lenght
			 * Minimum password lenght is extracted from database
			 */
			if(mb_strlen($input['new']) < $pwConfig['lenght'][0]){
				$notification['red'] = INot::not('notifications.changePass.lenght', ['lenght' => $pwConfig['lenght'][0]]);
			    return Redirect::route('user.settings')->with('notification', $notification);
			}
		    $user->password = Hash::make($input['new']);
		    $user->update();

			$notification['green'] = INot::not('notifications.changePass.success', ['name' => Auth::user()->first_name]);
		    return Redirect::route('user.settings')->with('notification', $notification);
		}

		/**
		 * In case of fail, it should return the following message:
		 *
		 * ---
		 * :name, something went wrong! Maybe the passwords did not match! Try again or ask for support at contact center!
		 * ---
		 */
		$notification['red'] = INot::not('notifications.changePass.danger', ['name' => Auth::user()->first_name]);
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

		    $notification['green'] = INot::not('notifications.changeName.success', ['name' => $input['first_name'].' '.$input['last_name']]);
		    return Redirect::route('user.settings', Auth::user()->id)->with('notification', $notification);

		}

		$notification['red'] = INot::not('notifications.changeName.danger', ['name' => Auth::user()->first_name]);
		return Redirect::route('user.settings', Auth::user()->id)->with('notification', $notification);
	}

	public function defaultIcon() {

		$user = User::find(Auth::user()->id);
		$icon = Input::file('icon');
		$icon_id = $user->icon->id;

		$avatar = Icon::find($icon_id);
		$avatar->icon_url = 'avt/default.jpg';
		$avatar->update();

		$notification['green'] = INot::not('notifications.changeIcon.default', ['name' => Auth::user()->first_name]);
		return Redirect::route('user.settings', Auth::user()->id)->with('notification', $notification);

	}

	public function changeIcon() {

		$user = User::find(Auth::user()->id);
		$icon = Input::file('icon');
		$icon_id = $user->icon->id;

		if(empty($icon)){
			$notification['red'] = INot::not('notifications.changeIcon.danger', ['name' => Auth::user()->first_name]);
			return Redirect::route('user.settings', Auth::user()->id)->with('notification', $notification);
		}

		if($user->isImage($icon)){
			$path = $user->uploadIcon($icon);

			$avatar = Icon::find($icon_id);
			$old_avatar = $avatar;
			$avatar->icon_url = $path;
			$avatar->update();

			$notification['green'] = INot::not('notifications.changeIcon.success', ['name' => Auth::user()->first_name]);
			return Redirect::route('user.settings', Auth::user()->id)->with('notification', $notification);
		}

	}

	public function editUsers(){
		$users = User::all();
		$users->nr = count($users);
		return View::make('user_settings.user_view_users')->with('users', $users);
	}

	public function editUser($id){
		$user = User::find($id);

		if(empty($user)){
			$notification['red'] = INot::not('notifications.editUser.non-existent.danger');
			return Redirect::route('user.editUsers', Auth::user()->id)->with('notification', $notification);
		}


		return View::make('user_settings.user_view_edit_users')->with('user', $user);
	}

	public function userUpdateHisPassword($id){

		$user = User::find($id);
		$input = Input::all();
		$pwConfig = ['lenght' => DB::table('security_settings')->lists('min_pw_lenght')];

		if(empty($input['old_pass']) ||
			empty($input['new']) ||
			 empty($input['new2'])){

			    $notification['red'] = INot::not('notifications.all_fields_are_important');
				return Redirect::route('edit.user', $id)->with('notification', $notification);
		}


		if(Hash::check($input['old_pass'], $user->password) && $input['new'] == $input['new2']){

			if(mb_strlen($input['new']) < $pwConfig['lenght']['0']){
			    $notification['red'] = INot::not('notifications.changePass.lenght', ['lenght' => $pwConfig['lenght'][0]]);
			    return Redirect::route('edit.user', $id)->with('notification', $notification);
			}


			$user->password = Hash::make($input['new']);
			$user->update();

			$notification['green'] = INot::not('notifications.changeHisPass', ['name' => $user->first_name]);
			return Redirect::route('edit.user', $id)->with('notification', $notification);
		}

	    $notification['red'] = INot::not('notifications.hisPassword.danger');
		return Redirect::route('edit.user', $id)->with('notification', $notification);
	}

	public function userUpdateHisName($id) {
		$user = User::find($id);
		$input = Input::all();

		if( !empty($input['first_name']) && !empty($input['last_name']) ){
			$user->first_name = $input['first_name'];
			$user->last_name = $input['last_name'];
			$user->update();

		    $notification['green'] = INot::not('notifications.hisName.success', ['name' => $user->first_name.' '.$user->last_name]);
			return Redirect::route('edit.user', $id)->with('notification', $notification);
		}

		$notification['red'] = INot::not('notifications.all_fields_are_important');
		return Redirect::route('edit.user', $id)->with('notification', $notification);
	}


	public function userUpdateHisIcon($id) {

		$user = User::find($id);
		$icon = Input::file('icon');

		$icon_id = $user->icon->id;

		if(empty($icon)){
		    $notification['red'] = INot::not('notifications.changeIcon.danger', ['name' => $user->first_name]);
			return Redirect::route('edit.user', $id)->with('notification', $notification);
		}

		if($user->isImage($icon)){
			$path = $user->uploadHisIcon($icon, $id);

			$avatar = Icon::find($icon_id);
			$old_avatar = $avatar;
			$avatar->user_id = $id;
			$avatar->icon_url = $path;
			$avatar->update();

			$notification['green'] = INot::not('notifications.changeHisIcon.success', ['name' => $user->first_name]);
			return Redirect::route('edit.user', $id)->with('notification', $notification);
		}

	}
}