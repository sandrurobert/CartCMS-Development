<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {

    parent::__construct();

		//html files folder
		$this->folder_name = 'login/';

		//files suffix
		$this->files_suffix = '_login';

		/* ===== MODELS & HELPERS ===== */
		$this->load->helper('login');
		$this->load->model('login_admin_model');

  }

	/**
	 * Main login page
	 */
	function index() {

		/* ===== SESSION VERIF. ===== */
		if( session_verif() ) {

			redirect( 'dashboard' );

		}

		$filenames = get_filenames( $this->folder_name, $this->files_suffix );

		$page_title = $this->lang->line('login_page_title');

		$content_data = array(

			'lang_page_title' 			=> $this->lang->line('login_page_title'),
			'lang_user_field' 			=> $this->lang->line('login_user_field'),
			'lang_pass_field' 			=> $this->lang->line('login_pass_field'),
			'lang_incorrect_login' 	=> $this->lang->line('error_incorrenct_login'),
			'lang_required_input' 	=> $this->lang->line('error_required_input'),
			'lang_submit_login' 		=> $this->lang->line('login_submit_login')

		);

		$top_nav_data = array(

			'lang_main_website'	=> $this->lang->line('login_main_website'),

		);

		$top_nav = $this->parser->parse( $filenames[ 'top_nav' ], $top_nav_data, true );
		$content = $this->parser->parse( $filenames[ 'content' ], $content_data, true );

		$page = page_builder( 'header', $page_title, 'body', $filenames[ 'body_header' ], $top_nav, 'body_content', $content );
		$this->parser->parse( 'base_template', $page );

	}

	/**
	 * login process
	 */
	function log_in() {

			$username = mysql_real_escape_string( $this->input->post('user') );
			$password = md5( $this->input->post('pass') );

			$access = $this->login_admin_model->get_access( $username, $password );

			if( ! empty( $access ) ) {

				create_session( $access );
				echo 1;

			} else {

				echo 0;

			}

	}

	/**
	 * logout process
	 */
	function log_out() {

		$data = array();

		$this->session->set_userdata( $data );
		$this->session->sess_destroy();

		redirect( 'login' );

	}

	/**
	 * @todo not yet done
	 */
	function register() {
		if($this->session->userdata('logged') == FALSE)
		 redirect("auth");

		 $this->load->view('register');
	}

	/**
	 * @todo not yet done
	 */
	function register_process() {
		 $user["user"] = $this->input->post("user");
		 $user["pass"] = md5($this->input->post("pass"));

		 if($this->db->insert("users",$user))
		  echo "yes";
	}

}
