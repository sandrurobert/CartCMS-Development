<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_admin_model extends CI_Model {


	/**
	 * dashboard stats
	 */
	function getRecords () {
	
		$modules = $this->db->query("select * from ep_modules where nickname <> 'homepage' ")->result();
		
		foreach( $modules as $md ) {
		
			if( $md->nickname == 'simple_page' ) {
			
				$rows = $this->db->query("select * from ep_pages")->result();
				$md->no = count( $rows );
				
				if( $md->no == 1 ) {
				
					$md->module_name = 'Page';
				
				} else {
				
					$md->module_name = 'Pages';
				
				}
			
			}
		
		}
		
		return $modules;
	
	}

}
