<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_admin_model extends CI_Model {


	/**
	 * Dashboard stats - for pages
	 */
	function get_page_records () {

		return $this->db->get('ep_pages')->result();

	}

}
