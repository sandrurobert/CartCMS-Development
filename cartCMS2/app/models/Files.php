<?php

/**
 * This Model is "bad looking" because of the string above.
 * It it bad looking because a good reason. (spacing in the
 * created php file)
 */

class Files extends \Eloquent {

	public static function createUrlsFile(){
		$file = fopen(app_path().'/misc/urls.php', 'w');


		$cont =

'<?php
	$base_url = "' .URL::to('/'). '";
?>';






		fwrite($file, $cont);
	}




}