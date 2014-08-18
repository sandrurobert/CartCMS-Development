<?php

class LostPasswordController extends \BaseController {

	/**
	 * Checks token and generate new password in case of lost Password
	 *
	 * @param  
	 * @return Response
	 */
	public function verifyLostPassToken($token)
	{
		$token = LostPassword::where('token', '=', $token)->get();
		
		
		if(!empty($token['0']->token)) {
			$message['newPass'] = str_random(10);
			$message['email'] = $token['0']->email;
			$data['email'] = $token['0']->email;

 			$hashPass = Hash::make($message['newPass']);
 			$user = User::where('email', '=', $data['email'])->get();
 			$user['0']->password = $hashPass;
 			$user['0']->update();

 			$userFunction = new User;
 			$userFunction->sendResetPassword($message, $data);

 			$delete = LostPassword::find($token['0']->id);
 			$delete->delete();

 			$notification['green'] = INot::not('notifications.lostPasswordReset.success');

			return Redirect::route('login.page')->with('notification', $notification);
		}

		$notification['red'] = INot::not('notifications.lostPasswordReset.fail');

		return Redirect::route('login.page')->with('notification', $notification);
	}


	/**
	 * Generate token and sent Email for lost password
	 *
	 * @param  
	 * @return Response
	 */
	public function lostPassword()
	{
		$email = Input::get('email');

		$checkEmail = User::where('email', '=', $email)->first();

		$checkIfLost = LostPassword::where('email', '=', $email)->first();

		if(!empty($checkEmail->email) && empty($checkIfLost->email)) {
			$token = str_random(40);
			$lostPassword = new LostPassword;
			$lostPassword->email = $email;
			$lostPassword->token = $token;

			$lostPassword->save();
			$data['email'] = $email;

			$message['email'] = $email;
			$message['token'] = $token;


			$lostPassword->sentMail($data, $message);

			$notification['green'] = INot::not('notifications.lostPassword.success');

			return Redirect::route('login.page')->with('notification', $notification);
		}
		$notification['red'] = INot::not('notifications.lostPassword.fail');

		return Redirect::route('login.page')->with('notification', $notification);
	}

	/**
	 * Lost Password View
	 *
	 * @param  
	 * @return View
	 */
	public function lostPasswordView()
	{
		return View::make('user_settings.lost_password');
	}



}