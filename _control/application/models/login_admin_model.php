<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_admin_model extends CI_Model {

	/**
	 * filenames
	 */
	function getFilenames ( $folder_name, $suffix ) {
	
		//top nav filename
		$filename[ 'top_nav' ] = $folder_name . 'top_nav' . $suffix;
		
		//body header filename
		$filename[ 'body_header' ] = $folder_name . 'body_header' . $suffix;
		
		//content filename
		$filename[ 'content' ] = $folder_name . 'content' . $suffix;
		
		
		return $filename;
	
	}
	
	/**
	 * login process
	 */
	function getAccess( $username, $password ) {
	
		$user = mysql_real_escape_string( $username );
		$pass = md5( $password );
		
		$findUser = $this->db->query("select * from ep_admin_users where user = '" . $user . "' and pass = '" . $pass . "'")->row();
		
		if ( $findUser ) {
		
			return $findUser;
		
		} else {
		
			return false;
		
		}
	
	}
	
	/**
	 * create session
	 */
	function createSession( $user ) {
	
		$session_data = array( 

								'id_user' => $user->id_user,
								'username' => $user->user,
								'inside' => true,
		
							);
							
		$this->session->set_userdata( $session_data );
		
		return true;
	
	}
	
	/**
	 * verification if logged user
	 */
	function sessionVerif () {
	
		if ( $this->session->userdata( 'inside' ) == true ) {
			
			return true;
			
		} else {
		
			return false;
		
		}
	
	}

}
