<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

  public function __construct() {

      parent::__construct();

  }

	/**
    * Get page content by module
    */
  function get_page_by_module ( $module ) {

    return $this->db->get_where('ep_pages', array('module' => $module))->row();

  }

  /**
    * Get page content by link_title
    */
  function get_page_by_link_title ( $link_title ) {

    return $this->db->get_where('ep_pages', array('link_title' => $link_title))->row();

  }

  /**
    * Get parent pages
    * @return array of objects
    */
  function get_parents () {

  	return $this->db->get_where('ep_pages', array('page_type' => '1'))->result();

  }

  /**
    * Get children pages
    * @return array of objects
    */
  function get_children ( $id_page ) {

    return $this->db->get_where('ep_pages', array('page_type' => $id_page))->result();

  }

}
