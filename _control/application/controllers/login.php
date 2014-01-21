<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
	
    parent::__construct();
		
		//html files folder
		$this->folder_name = 'login/';
		
		//files suffix
		$this->files_suffix = '_login';
		
  }
	
	/**
	 * login page
	 */
	function index() {
	
		/* ===== SESSION VERIF. ===== */
		if( $this->login_admin_model->sessionVerif() ) {

			redirect( 'dashboard' );

		}
	
		$filenames = $this->login_admin_model->getFilenames( $this->folder_name, $this->files_suffix );
		
		$page_title = 'Login';
		$content = $this->load->view( $filenames[ 'content' ], '', true );
		
		$page = $this->main_admin_model->getPage( 'header', $page_title, 'body', $filenames[ 'body_header' ], $filenames[ 'top_nav' ], 'body_content', $content );
		$this->parser->parse( 'base_template', $page );
		
	}
	
	/**
	 * login process
	 */
	function log_in() {
	
			$username = $this->input->post('user');
			$password = $this->input->post('pass');
			
			$access = $this->login_admin_model->getAccess( $username, $password );
			
			if( $access ) {
			
				$this->login_admin_model->createSession( $access );
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
