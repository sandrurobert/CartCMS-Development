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
		
		$page_title = $this->lang->line('general_title');

		$langs = array(

			'lang_page_title' 		=> $this->lang->line('general_title'),
			'lang_website_title'	=> $this->lang->line('website_title'),
			'lang_logo'						=> $this->lang->line('logo'),
			'lang_copyright'			=> $this->lang->line('copyright')

		);

		$settings = array_merge( $settings, $langs );

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
		
		$page_title = $this->lang->line('user_title');

		$langs = array(

			'lang_page_title' 			=> $this->lang->line('user_title'),
			'lang_required_input' 	=> $this->lang->line('error_required_input'),
			'lang_username'					=> $this->lang->line('username_field'),
			'lang_password'					=> $this->lang->line('password_field'),

		);

		$user_data = array_merge( $user_data, $langs );

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
		
		$page_title = $this->lang->line('modules_title');

		$content_data = array(

			'lang_page_title' 	=> $this->lang->line('modules_title'),
			'lang_contruction' 	=> $this->lang->line('misc_construction')

		);

		$content = $this->parser->parse( $content_filename, $content_data, true );
		
		$page = $this->main_admin_model->getPage( 'header', $page_title, 'body', 'body_header', 'top_nav', 'body_content', $content );
		$this->parser->parse( 'base_template', $page );
	
	}
	
}
