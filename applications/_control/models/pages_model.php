<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages_model extends CI_Model {

	/**
	 * Gets all pages
	 */
	function get_all_pages() {

		return $this->db->get('ep_pages')->result();

	}

	/**
	 * Get page by id
	 */
	function get_page_by_id( $id_page ) {

		return $this->db->get_where('ep_pages', array('id_page' => $id_page))->row();

	}

	/**
	 * Gets all parent pages
	 */
	function get_parents() {

		return $this->db->get_where('ep_pages', array('page_type' => '1','page_type' => '0'))->result();

	}

	/**
	 * Get parents by id
	 */
	function get_parents_by_id( $id_page ) {

		return $this->db->get_where('ep_pages', array('page_type' => '1', 'page_type' => '0', 'id_page !=' => $id_page))->result();

	}

	/**
	 * Gets all modules
	 */
	function get_modules($module = 'no-module') {

		$all_pages = $this->get_all_pages();
		$homepage_exists = false;

		foreach($all_pages as $page) {
			if ($page->module == 'homepage' && $module != 'homepage') {
				$homepage_exists = true;
			}
		}

		if ($homepage_exists) {
			return $this->db->get_where('ep_modules', array('nickname !=' => 'homepage'))->result();
		} else {
			return $this->db->get('ep_modules')->result();
		}

	}

	/**
	 * Inserts a new page
	 */
	function insert_page( $page ) {

		return $this->db->insert( "ep_pages", $page );

	}

	/**
	 * Update a page
	 */
	function update_page( $page, $id_page ) {

		return $this->db->update( "ep_pages", $page, array( 'id_page' => $id_page ) );

	}

	/**
	 * Delete a page
	 */
	function delete_page( $id_page ) {

		return $this->db->delete('ep_pages', array('id_page' => $id_page));

	}

}

/* End of file pages_model.php */
/* Location: ./applications/_control/models/pages_model.php */