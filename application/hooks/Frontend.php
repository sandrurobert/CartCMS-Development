<?php
class Frontend {

	/**
	 * fixing the base url and site url
	 */
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
	 * getting all settings
	 */
	public function settings() {

		$CI =& get_instance();
 	  $this->output = & $CI->output;
  	$output = $this->output->get_output();

		$title = $CI->db->query("select * from ep_admin_settings where name = 'website_title'")->row();
		$output = str_replace('{website_title}',$title->value,$output);

		$logo = $CI->db->query("select * from ep_admin_settings where name = 'website_logo'")->row();
		$output = str_replace('{website_logo}',$logo->value,$output);

		$copyright = $CI->db->query("select * from ep_admin_settings where name = 'website_copyright'")->row();
		$output = str_replace('{website_copyright}',$copyright->value,$output);

		$this->output->set_output($output);

	}

}
?>