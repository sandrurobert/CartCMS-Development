<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct() {

    parent::__construct();

		//html files folder
		$this->folder_name = 'settings/';

		//files suffix
		$this->files_suffix = '_settings';

		/* ===== MODELS & HELPERS ===== */
		$this->load->model( 'settings_admin_model' );

  }

	/**
	 * General settings page
	 */
	function index() {

		$settings = $this->settings_admin_model->getSettings();
		$content_filename = $this->folder_name . 'general' . $this->files_suffix;

		$page_title = $this->lang->line('general_settings_page_title');

		$langs = array(

			'lang_page_title' 		=> $this->lang->line('general_settings_page_title'),
			'lang_website_title'	=> $this->lang->line('general_settings_website_title'),
			'lang_logo'						=> $this->lang->line('general_settings_logo'),
			'lang_copyright'			=> $this->lang->line('general_settings_copyright')

		);

		$settings = array_merge( $settings, $langs );

		$content = $this->parser->parse( $content_filename, $settings, true );

		$page = page_builder( 'header', $page_title, 'body', 'body_header', 'top_nav', 'body_content', $content );
		$this->parser->parse( 'base_template', $page );

	}

	/**
	 * Account settings page
	 */
	function account( $id_user ) {

		$user_data = get_logged_user_by_id( $id_user );
		$content_filename = $this->folder_name . 'user' . $this->files_suffix;

		$page_title = $this->lang->line('account_settings_page_title');

		$langs = array(

			'lang_page_title' 			=> $this->lang->line('account_settings_page_title'),
			'lang_required_input' 	=> $this->lang->line('error_required_input'),
			'lang_username'					=> $this->lang->line('account_settings_username_field'),
			'lang_password'					=> $this->lang->line('account_settings_password_field'),

		);

		$user_data = array_merge( $user_data, $langs );

		$content = $this->parser->parse( $content_filename, $user_data, true );

		$page = page_builder( 'header', $page_title, 'body', 'body_header', 'top_nav', 'body_content', $content );
		$this->parser->parse( 'base_template', $page );

	}

	/**
	 * account settings process
	 */
	function account_process( $id_user ) {

		$user_data[ 'user' ] = $this->input->post( 'user' );

		if ( $this->input->post( 'pass' ) ) {

				$user_data[ 'pass' ] = $this->input->post( 'pass' );

		}

		if( $this->settings_admin_model->update_user_by_id( $user_data, $id_user ) ) {

			redirect( 'account/' . $id_user );

		}

	}

	/**
	 * Modules settings page
	 */
	function modules() {

		$content_filename = $this->folder_name . 'modules' . $this->files_suffix;

		$page_title = $this->lang->line('modules_settings_page_title');

		$content_data = array(

			'lang_page_title' 	=> $this->lang->line('modules_settings_page_title'),
			'lang_contruction' 	=> $this->lang->line('misc_construction')

		);

		$content = $this->parser->parse( $content_filename, $content_data, true );

		$page = page_builder( 'header', $page_title, 'body', 'body_header', 'top_nav', 'body_content', $content );
		$this->parser->parse( 'base_template', $page );

	}

}
