<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {

  function __construct() {

    parent::__construct();

    $this->load->model( 'main_model' );

  }

	/**
		* Homepage
		*/
	function index () {

		$page_info = $this->main_model->get_page_by_module('homepage');

    $data = array(
      'page_title'    => $page_info->title,
      'page_content'  => $this->getContent($page_info)
    );

		$template = template_builder( 'default', page_sidebars(), $data );
    $this->parser->parse( 'default/base', $template );

	}

	/**
		* Content for homepage
		*/
	public function getContent ( $page ) {

		return $page->content;

  }
}
