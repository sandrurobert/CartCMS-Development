<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_hook {

	/**
	 * making parsed urls
	 */
	public function urls() {

		$CI =& get_instance();
 	  $this->output = & $CI->output;
  	$output = $this->output->get_output();

    //$base_url = rtrim(base_url(),'/');
    $base_url = base_url() . '_control.php';
    $app_url = base_url() . 'applications/_control';

    $output = str_replace('{BASE_URL}', $base_url, $output);
    $output = str_replace('{APP_URL}', $app_url, $output);

		$this->output->set_output($output);

	}

	/**
	 * cleaning page title
	 */
	public function cleaning() {

		$CI =& get_instance();
    $this->output = & $CI->output;
    $output = $this->output->get_output();

		$output = str_replace('{TITLE}','',$output);

		$this->output->set_output($output);

	}

	/**
	 * logged user info
	 */
	public function user_info() {

		$CI =& get_instance();
    $this->output = & $CI->output;
    $output = $this->output->get_output();

		$output = str_replace('{loggedUser}',$CI->session->userdata('username'),$output);
		$output = str_replace('{id_loggedUser}',$CI->session->userdata('id_user'),$output);

		$this->output->set_output($output);

	}

}
