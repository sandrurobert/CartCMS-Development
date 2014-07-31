<?php

class PendingUser extends \Eloquent {
	protected $fillable = ['email', 'register_token', 'account_rank', 'creator_user_id'];
	protected $table = 'pending_users';
}