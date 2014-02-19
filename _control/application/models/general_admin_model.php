<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class General_admin_model extends CI_Model {

	/**
	 * Returns logged user
	 */
	function logged_user( $id_user ) {

		return $this->db->get_where('ep_admin_users', array('id_user' => $id_user))->row_array();

	}

}
