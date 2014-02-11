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

	/* -------------- NAVIGATION -------------- */
	function getHeader () {

		$nav = $this->db->query(" select * from ep_pages where page_type = '1' ")->result();

		foreach($nav as $menu) {

			$chs = $this->db->query("select * from ep_pages where page_type = '" . $menu->id_page . "' ")->result();

			if ( ! empty( $chs ) ) {

				foreach ( $chs as $kid ) {

					$kid->s_page_link = site_url() . "/page/" . $kid->link_title;
					$kid->s_title = $kid->title;

				}

				$menu->S_NAV = $chs;

			} else {

				$menu->S_NAV = array();

			}

			if ( $menu->module == 'homepage' ) {

				$menu->page_link = site_url();

			} elseif( $menu->module == 'empty' ) {

				$menu->page_link = '#';

			} else {

				$menu->page_link = site_url() . "/page/" . $menu->link_title;

			}

		}

		return $nav;

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
