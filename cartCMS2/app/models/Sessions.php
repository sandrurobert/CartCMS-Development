<?php

class Sessions extends \Eloquent {
	protected $fillable = ['id', 'user_id', 'payload', 'last_activity'];
	protected $table = 'sessions';

	public static function updateUser(){
		$userId = Auth::user()->id;
		$roleId = Auth::user()->roles->first()->id;

		$update = Sessions::find(Session::getId());

		if(!empty($update)){
			$update->user_id = $userId;
			$update->role_id = $roleId;
			$update->save();
		}
	}

	public static function deleteUser(){
		$userId = Auth::user()->id;

		$update = Sessions::find(Session::getId());
		$update->delete();
	}

	public static function checkIdleUsers(){
		$sessions = Sessions::all();
		$securitySettings = SecuritySettings::find(1);

		foreach($sessions as $session){
			if(!empty($session->user_id)){
				if(time() > $session->last_activity + $securitySettings['max_session_idle']){
					$session->delete();
				}
			}
		}

	}

	public static function getOnlineUsersNr(){
		return $sessions = Sessions::where('user_id', '>', 0)->count();
	}

	public static function getOnlineOwnersNr(){
		return $sessions = Sessions::where('role_id', '=', 1)->count();
	}

	public static function getOnlineAdminsNr(){
		return $sessions = Sessions::where('role_id', '=', 2)->count();
	}

	public static function getOnlineWorkersNr(){
		return $sessions = Sessions::where('role_id', '=', 3)->count();
	}




}