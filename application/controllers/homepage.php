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

    $parts = array(
      'head'              => $page_info->title,
      'header'            => $page_info->title,
      'nav'               => 'nav',
      'simple_page_full'  => 'simple_page_full',
      'footer'            => 'footer'
    );

    $data = array(
      'page_title'    => $page_info->title,
      'page_content'  => $page_info->content
    );

		$template = template_builder( 'default', $parts, $data );
    $this->parser->parse( 'default/base', $template );

	}

	/**
		* Content for homepage
		*/
	public function getContent ( $content_type, $content, $page_title ) {

		return $page_info->content;

  }
}
