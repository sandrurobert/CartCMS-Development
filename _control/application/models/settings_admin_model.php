<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Settings_admin_model extends CI_Model {

	/* -------------- SETTINGS -------------- */
	function getSettings() {
	
		//website title
		$website_title = $this->db->query("select * from ep_admin_settings where setting_name = 'title'")->row();
		$settings['website_title'] = $website_title->setting_descr;
		
		//logo
		$logo = $this->db->query("select * from ep_admin_settings where setting_name = 'logo'")->row();
		$settings['logo'] = $logo->setting_descr;
		
		//copyright
		$copyright = $this->db->query("select * from ep_admin_settings where setting_name = 'copyright'")->row();
		$settings['copyright'] = $copyright->setting_descr;
		
		return $settings;
	
	}
	
	function getUser( $id_user ) {
	
		$user_data = $this->db->query( " select * from ep_admin_users where id_user = '" . $id_user . "' " )->row();
		
		return $user_data;
	
	}
	
}
