<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Settings_admin_model extends CI_Model {

	/**
	 * Get setting by name
	 */
	function get_setting_by_name( $name ) {

		return $this->db->query("select * from ep_admin_settings where name = '" . $name . "'")->row()->value;

	}

	/**
	 * Update user
	 */
	function update_user_by_id( $data, $id_user ) {

		return $this->db->update( 'ep_admin_users', $data, array( 'id_user' => $id_user ) );

	}

	/**
	 * Update setting
	 */
	function update_setting( $data, $name ) {

		return $this->db->update( 'ep_admin_settings', $data, array( 'name' => $name ) );

	}

}

/* End of file settings_admin_model.php */
/* Location: ./applications/_control/models/settings_admin_model.php */