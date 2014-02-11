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

		$title = $page_info->title;
		$header = $this->main_model->getHeader();
		$content = $this->getContent($page_info);
		$footer = $this->main_model->getFooter();

		$main_data = $this->main_model->getParse( $title, $header, $content, $footer, $meta_descr, $meta_key );
    $this->parser->parse( 'base_template', $main_data );

	}

	/**
		* Content for homepage
		*/
	public function getContent ( $content_type, $content, $page_title ) {

		return $page_info->content;

  }
}
