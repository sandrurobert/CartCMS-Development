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
	
	public function settings() {
		$CI =& get_instance();
 	    $this->output = & $CI->output;
  	    $output = $this->output->get_output();
		
		$title = $CI->db->query("select * from ep_admin_settings where setting_name = 'title'")->row();
		$output = str_replace('{websiteTitle}',$title->descr,$output);
		
		$logo = $CI->db->query("select * from ep_admin_settings where setting_name = 'logo'")->row();
		$output = str_replace('{logo}',$logo->descr,$output);
		
		$copyright = $CI->db->query("select * from ep_admin_settings where setting_name = 'copyright'")->row();
		$output = str_replace('{copyright}',$copyright->descr,$output);
		
		$this->output->set_output($output);
	}
		
}
?>