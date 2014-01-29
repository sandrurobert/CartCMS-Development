<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_admin_model extends CI_Model {


	/**
	 * pages dashboard stats
	 */
	function get_page_records () {
	
		return $this->db->query("select * from ep_pages")->result();

	}

}
