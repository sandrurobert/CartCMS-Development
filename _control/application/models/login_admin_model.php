<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_admin_model extends CI_Model {

	/**
	 * Returns the user for login
	 */
	function get_access( $username, $password ) {

		return $this->db->query("select * from ep_admin_users where user = '" . $username . "' and pass = '" . $password . "'")->row();

	}

}
