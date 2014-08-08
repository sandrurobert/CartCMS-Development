<?php

class PendingUser extends \Eloquent {
	protected $fillable = ['email', 'register_token', 'account_rank', 'creator_user_id'];
	protected $table = 'pending_users';

	public function verifyToken($token){
		$user = $this->where('register_token', '=', $token)->first();

		if(!empty($user)){
			return true;
		}
		else{
			return false;
		}
	}


	public function getAllPendingData($token){
		return $user = $this->where('register_token', '=', $token)->first();
	}

}