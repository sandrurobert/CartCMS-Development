<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

  public function __construct() {

      parent::__construct();

  }

	/**
    * Get page content by module
    */
  function get_page_by_module ( $module ) {

  	return $this->db->query("select * from ep_pages where module = '" . $module . "'")->row();

  }

  /**
    * Get page content by link_title
    */
  function get_page_by_link_title ( $link_title ) {

    return $this->db->query("select * from ep_pages where link_title = '" . $link_title . "'")->row();

  }

  /**
    * Get parent pages
    * @return array of objects
    */
  function get_parents () {

  	return $this->db->query("select * from ep_pages where page_type = '1'")->result();

  }

  /**
    * Get children pages
    * @return array of objects
    */
  function get_children ( $id_page ) {

  	return $this->db->query("select * from ep_pages where page_type = '" . $id_page . "'")->result();

  }

}
