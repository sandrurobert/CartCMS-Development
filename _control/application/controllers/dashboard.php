<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
	
    parent::__construct();
			
		/* ===== MODELS ===== */
		$this->load->model( 'dashboard_admin_model' );
					 
  }
	
	/**
	 * dashboard page
	 */
	function index() {
		
		$stats = $this->dashboard_admin_model->getRecords();

		$page_title = $this->lang->line('dashboard_title');

		$content_data = array(

			'STATS' 							=> $stats,
			'lang_page_title' 		=> $page_title,
			'lang_records' 				=> $this->lang->line('website_records'),
			'lang_amount' 				=> $this->lang->line('amount'),
			'lang_records_added' 	=> $this->lang->line('records_added')

		);

		$content = $this->parser->parse( 'dashboard', $content_data, true );
		
		$page = $this->main_admin_model->getPage( 'header', $page_title, 'body', 'body_header', 'top_nav', 'body_content', $content, 'body_footer' );
		$this->parser->parse( 'base_template', $page );
		
	}
	
}
