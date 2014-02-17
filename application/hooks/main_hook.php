
<?php
class Main_hook {

	/**
	 * fixing the base url and site url
	 */
	public function fix_base_url() {

		$CI =& get_instance();
 	  $this->output = & $CI->output;
  	$output = $this->output->get_output();

		$base_url = rtrim(base_url(),'/');

    $output = str_replace('{BASE_URL}', $base_url,$output);

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

		$website_title = $CI->db->get_where('ep_admin_settings', array('name' => 'website_title'))->row()->value;
		$output = str_replace('{website_title}', $website_title, $output);

		$website_logo = $CI->db->get_where('ep_admin_settings', array('name' => 'website_logo'))->row()->value;
		$output = str_replace('{website_logo}', $website_logo, $output);

		$website_copyright = $CI->db->get_where('ep_admin_settings', array('name' => 'website_copyright'))->row()->value;
		$output = str_replace('{website_copyright}', $website_copyright, $output);

		$this->output->set_output($output);

	}

}
?>