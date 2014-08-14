<?php

class MailSettings extends \Eloquent {
	protected $fillable = ['driver', 'host', 'port', 'address', 'name', 'encryption',
	'username', 'password', 'sendmail', 'pretend', 'last_update_by'];

	protected $table = 'mail_settings';
}