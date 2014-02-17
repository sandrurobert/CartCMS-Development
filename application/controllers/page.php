<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

  function __construct() {

      parent::__construct();

  }

	function _remap( $link_title ) {

		$this->index( $link_title );

	}

	/**
		* Main function for generating pages
		*/
	function index ( $link_title ) {

		$page_info = $this->main_model->get_page_by_link_title($link_title);

		$data = array(
      'page_title'    => $page_info->title,
      'page_content'  => $page_info->content
    );

		$template = template_builder( 'default', page_sidebars(), $data );
    $this->parser->parse( 'default/base', $template );

	}

}
