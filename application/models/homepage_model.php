<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Homepage_model extends CI_Model {

    public function __construct() {
	
        parent::__construct();

        $this->load->database();
		
		//module filename(s)
		$this -> filename = 'home';
		
    }
	
	/* -------------- HOMEPAGE CONTENT -------------- */
	function getHomepage () {
	
		$latest_news = $this -> db -> query(" select * from ep_posts order by cdate desc limit 3 ") -> result();
		
		$parsed_content = $this -> parser -> parse( $this -> filename, array( 'NEWS' => $latest_news ), TRUE );
		
		return $parsed_content;
	
	}

}
