<?php

class SecuritySettings extends \Eloquent {
	protected $fillable = ['min_pw_lenght', 'session_idle'];
	protected $table = 'security_settings';
}