<?php

class SiteSettings extends \Eloquent {
	protected $fillable = ['title', 'keywords', 'description'];
	protected $table = 'site_settings';
}