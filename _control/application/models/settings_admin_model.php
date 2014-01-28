<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Settings_admin_model extends CI_Model {

	/**
	 * get all settings
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
	
	function getUser( $id_user ) {
	
		$user_data = $this->db->query( " select * from ep_admin_users where id_user = '" . $id_user . "' " )->row_array();
		
		return $user_data;
	
	}
	
}
