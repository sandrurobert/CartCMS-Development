<?php
class Frontend {
	
	public function fix_base_url() {
		$CI =& get_instance();
 	    $this->output = & $CI->output;
  	    $output = $this->output->get_output();
		
		$site_url = site_url();
  	    $base_url = base_url();
		
		$output = str_replace('{BASE_URL}/',$base_url,$output);
 	    $output = str_replace('{BASE_URL}',$base_url,$output);
  	    $output = str_replace('{SITE_URL}',$site_url,$output);
		
		$this->output->set_output($output);
	}
	
	public function cleaning() {
		$CI =& get_instance();
 	    $this->output = & $CI->output;
  	    $output = $this->output->get_output();
		
		$output = str_replace('{TITLE}','',$output);
		
		$this->output->set_output($output);
	}
	
	public function user_info() {
		$CI =& get_instance();
 	    $this->output = & $CI->output;
  	    $output = $this->output->get_output();
		
		$output = str_replace('{loggedUser}',$CI->session->userdata('username'),$output);
		$output = str_replace('{id_loggedUser}',$CI->session->userdata('id_user'),$output);
		
		$this->output->set_output($output);
	}
}
?>