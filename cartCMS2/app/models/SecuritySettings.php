<?php

class SecuritySettings extends \Eloquent {
	protected $fillable = ['min_pw_lenght'];
	protected $table = 'security_settings';
}