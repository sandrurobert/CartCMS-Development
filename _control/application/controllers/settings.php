<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct() {
	
    parent::__construct();
		
		/* ===== MODELS ===== */
		$this->load->model( 'settings_admin_model' );
				
		//html files folder
		$this->folder_name = 'settings/';
		
		//files suffix
		$this->files_suffix = '_settings';
		
    }
	
	/**
	 * general settings
	 */
	function index() {
	
		$settings = $this->settings_admin_model->getSettings();
		$content_filename = $this->folder_name . 'general' . $this->files_suffix;
		
		$page_title = 'General Settings';
		$content = $this->parser->parse( $content_filename, $settings, true );
		
		$page = $this->main_admin_model->getPage( 'header', $page_title, 'body', 'body_header', 'top_nav', 'body_content', $content );
		$this->parser->parse( 'base_template', $page );
		
	}
	
	/**
	 * user settings
	 */
	function account( $id_user ) {
	
		$user_data = $this->settings_admin_model->getUser( $id_user );
		$content_filename = $this->folder_name . 'user' . $this->files_suffix;
		
		$page_title = 'User Settings';
		$content = $this->parser->parse( $content_filename, $user_data, true );
		
		$page = $this->main_admin_model->getPage( 'header', $page_title, 'body', 'body_header', 'top_nav', 'body_content', $content );
		$this->parser->parse( 'base_template', $page );
			
	}
	
	/**
	 * user settings process
	 */
	function account_process( $id_user ) {
	
		$user_data[ 'user' ] = $this->input->post( 'user' );
		
		if ( $this->input->post( 'pass' ) ) {

				$user_data[ 'pass' ] = $this->input->post( 'pass' );

		}
			
		if( $this->db->update( 'ep_admin_users', $user_data, array( 'id_user' => $id_user ) ) ) {

			redirect( 'account/' . $id_user );

		}
	
	}
	
	/**
	 * modules settings
	 */
	function modules () {
	
		$content_filename = $this->folder_name . 'modules' . $this->files_suffix;
		
		$page_title = 'Modules Settings';
		$content = $this->load->view( $content_filename, '', true );
		
		$page = $this->main_admin_model->getPage( 'header', $page_title, 'body', 'body_header', 'top_nav', 'body_content', $content );
		$this->parser->parse( 'base_template', $page );
	
	}
	
}
