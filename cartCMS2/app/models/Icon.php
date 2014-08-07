<?php

class Icon extends \Eloquent {
	protected $fillable = ['user_id', 'icon_url'];

	public function user()
	  {
	    return $this->belongsTo('User');
	  }
}