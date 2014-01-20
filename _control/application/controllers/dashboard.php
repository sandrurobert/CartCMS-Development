<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
	
        parent::__construct();
			
		/* ===== MODELS ===== */
        $this->load->model( 'main_admin_model' );
		$this->load->model( 'login_admin_model' );
		$this->load->model( 'dashboard_admin_model' );
		
		/* ===== SESSION VERIF. ===== */
		if( ! $this->login_admin_model->sessionVerif() )
			redirect( 'login' );
			 
    }
	
	function index() {
		
		$stats = $this->dashboard_admin_model->getRecords();
		
		$page_title = 'Dashboard';
		$content = $this->parser->parse( 'dashboard', array( 'STATS' => $stats ), true );
		
		$page = $this->main_admin_model->getPage( 'header', $page_title, 'body', 'body_header', 'top_nav', 'body_content', $content, 'body_footer' );
		$this->parser->parse( 'base_template', $page );
		
		
	}
	
}
