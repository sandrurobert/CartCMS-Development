<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct() {

    parent::__construct();

		/* ===== MODELS ===== */
		$this->load->model( 'dashboard_admin_model' );

  }

	/**
	 * dashboard page
	 */
	function index() {

		$page_records = $this->dashboard_admin_model->get_page_records();
		$page_records_no = count( $page_records );
		if( $page_records_no == 1 ) {

			$page_records_name = $this->lang->line('dashboard_pages_singular');

		} else {

			$page_records_name = $this->lang->line('dashboard_pages_plural');

		}

		$page_title = $this->lang->line('dashboard_page_title');

		$content_data = array(

			'pages_no' 						=> $page_records_no,
			'page_record_name' 		=> $page_records_name,
			'lang_page_title' 		=> $page_title,
			'lang_records' 				=> $this->lang->line('dashboard_website_records'),
			'lang_amount' 				=> $this->lang->line('dashboard_amount'),
			'lang_records_added' 	=> $this->lang->line('dashboard_records_added')

		);

		$content = $this->parser->parse( 'dashboard', $content_data, true );

		$page = page_builder( 'header', $page_title, 'body', 'body_header', 'top_nav', 'body_content', $content, 'body_footer' );
		$this->parser->parse( 'base_template', $page );

	}

}
