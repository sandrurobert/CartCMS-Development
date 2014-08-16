<?php

class LostPassword extends \Eloquent {
	protected $fillable = ['email', 'token'];
	protected $table = 'lost_password';

	public function sentMail($data, $message)
	{
		Mail::send('emails.reset_password', $message, function($message) use ($data)
			{
			    $message->to($data['email'])->subject('Reset Password');
			});
	}
}