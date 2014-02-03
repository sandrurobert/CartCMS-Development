<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Settings_admin_model extends CI_Model {

	/**
	 * Returns all settings
	 */
	function getSettings() {

		//website title
		$website_title = $this->db->query("select * from ep_admin_settings where name = 'website_title'")->row();
		$settings['website_title'] = $website_title->value;

		//website logo
		$website_logo = $this->db->query("select * from ep_admin_settings where name = 'website_logo'")->row();
		$settings['logo'] = $website_logo->value;

		//website copyright
		$website_copyright = $this->db->query("select * from ep_admin_settings where name = 'website_copyright'")->row();
		$settings['copyright'] = $website_copyright->value;

		return $settings;

	}

	/**
	 * Update user
	 */
	function update_user_by_id( $data, $id_user ) {

		return $this->db->update( 'ep_admin_users', $data, array( 'id_user' => $id_user ) );

	}

}
