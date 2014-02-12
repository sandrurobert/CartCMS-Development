<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

    public function __construct() {

        parent::__construct();

        $this->load->database();

		//header filename
		$this->header_filename = 'header';

		//footer filename
		$this->footer_filename = 'top_footer';

    }

	/**
    * Get page content by module
    */
  function get_page_by_module ( $module ) {

  	return $this->db->query("select * from ep_pages where module = '" . $module . "'")->row();

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

	/* -------------- FOOTER -------------- */
	function getFooter () {

		$recent_posts = $this->db->query(" select * from ep_posts limit 3 ")->result();

		return $recent_posts;


	}

	/* -------------- SIDEBAR -------------- */
	function getSidebar () {

		$side_posts = $this->db->query(" select * from ep_posts order by cdate desc limit 3 ")->result();

		return $side_posts;


	}

	/* -------------- MAIN PARSE DATA -------------- */
	function getParse ( $title = '', $header = '', $content = '', $footer = '', $meta_descr = '', $meta_key = '' ) {

		$data['TITLE'] = $title;
		$data['HEADER'] = $this->parser->parse( $this->header_filename, array( 'NAV' => $header ), true );
		$data['MAIN'] = $content;
		$data['TOP_FOOTER'] = $this->parser->parse( $this->footer_filename, array( 'RECENT_POSTS' => $footer ), true );
		$data['meta_descr'] = $meta_descr;
		$data['meta_key'] = $meta_key;

		return $data;

	}


}
