<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_admin_model extends CI_Model {

	/**
	 * Returns the user for login
	 */
	function get_access( $username, $password ) {

		return $this->db->get_where('ep_admin_users', array('user' => $username, 'pass' => $password))->row();

	}

}
