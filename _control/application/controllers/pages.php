<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct() {
	
    parent::__construct();
		
		/* ===== MODELS ===== */
		$this->load->model( 'pages_model' );
		
		//html files folder
		$this->folder_name = 'pages/';
		
		//files suffix
		$this->files_suffix = '_pages';
		
    }
	
	/**
	 * pages
	 */
	function index() {
	
		//get filenames
		$filenames = $this->pages_model->getFilenames( $this->folder_name, $this->files_suffix );
		
		//get content
		$pages = $this->db->query( "select * from ep_pages" )->result();
		
		//fallback message
		$no_content = $this->lang>line('error_no_pages');
		
		$page_title = 'Pages';
		
		if( empty( $pages ) ) {
		
			$content = $this->parser->parse( $filenames[ 'no-content' ], array( 'no_content' => $no_content ), true );
		 
		} else {
		
			$content = $this->parser->parse( $filenames[ 'list' ], array( 'PAGES' => $pages ), true );  
			
		}
		
		$page = $this->main_admin_model->getPage( 'header', $page_title, 'body', 'body_header', 'top_nav', 'body_content', $content );
		$this->parser->parse( 'base_template', $page );
		
	}
	
	/**
	 * add a page
	 */
	function add() {
	
		//get filenames
		$filenames = $this->pages_model->getFilenames( $this->folder_name, $this->files_suffix );
	
		//get content
		$page_type = $this->db->query("select * from ep_pages where page_type='1'")->result();
		$modules = $this->db->query("select * from ep_modules")->result();
		
		$page_title = 'Pages';
		
		$content = $this->parser->parse( $filenames[ 'add_page' ], array( 'PAGE_TYPE' => $page_type, 'MODULES' => $modules ), true ); 
		
		$page = $this->main_admin_model->getPage( 'header', $page_title, 'body', 'body_header', 'top_nav', 'body_content', $content );
		$this->parser->parse( 'base_template', $page );
		
	}
	
	/**
	 * add a page process
	 */
	function add_process() {
	
		$pages[ 'title' ] = $this->input->post( 'title' );
		$pages[ 'page_type' ] = $this->input->post( 'page_type' );
		$pages[ 'module' ] = $this->input->post( 'module' );
		$pages[ 'content' ] = $this->input->post( 'content' );
		
		if( $pages[ 'module' ] == 'homepage' ) {
			
			$link_title = "homepage";
			
		} else {
		
			$link_title = $pages[ 'title' ];
			$link_title_lowercase = strtolower($link_title);
			$new_link_title = str_replace(' ', '_', $link_title_lowercase);
			
		}
		
		$pages[ 'link_title' ] = $new_link_title;
		
		if( $this->db->insert( "ep_pages", $pages ) ) {
		
			echo 'success';
		
		} else {
		
			echo 'error';
		
		}
		   
	}
	
	/**
	 * edit a page
	 */
	function edit( $id_page ) {
	
		//get filenames
		$filenames = $this->pages_model->getFilenames( $this->folder_name, $this->files_suffix );
	
		$page_info = $this->db->query( "select * from ep_pages where id_page = '".$id_page."' " )->row();
		
		$page_type = $this->db->query( "select * from ep_pages where page_type = '1' and id_page <> '".$id_page."'")->result();
		foreach( $page_type as $type ) {
		
			if( $page_info->page_type == $type->id_page ) {
			
				$type->selected = "selected = 'selected'";
			
			} else {
			
				$type->selected = "";
				
			}
				
		}
		
		$modules = $this->db->query( "select * from ep_modules" )->result();
		foreach( $modules as $mod ){
		
			if ( $mod-> nickname == $page_info->module ) {
			
				$mod->selected = "selected='selected'";
				
			} else {
			
				$mod->selected = "";
				
			}
		
		}
		
		$page_title = 'Edit ' . $page_info->title . ' page';
		
		$content = $this->parser->parse( $filenames[ 'edit_page' ], array( 
		
																				'PAGE_TYPE' => $page_type, 
																				'MODULES' => $modules,
																				'title' => $page_info->title,
																				'id_page' => $page_info->id_page,
																				'content' => $page_info->content
																				
																			), true );
	
		$page = $this->main_admin_model->getPage( 'header', $page_title, 'body', 'body_header', 'top_nav', 'body_content', $content );
		$this->parser->parse( 'base_template', $page );
	
	}
	
	/**
	 * edit a page process
	 */
	function edit_process( $id_page ) {
	
		$pages[ 'title' ] = $this->input->post( 'title' );
		$pages[ 'page_type' ] = $this->input->post( 'page_type' );
		$pages[ 'meta_key' ] = $this->input->post( 'meta_key' );
		$pages[ 'meta_descr' ] = $this->input->post( 'meta_descr' );
		$pages[ 'module' ] = $this->input->post( 'modules' );
		
		if( $pages[ 'module' ] == 'homepage' ) {
			
			$link_title = "homepage";
			
		} else {
		
			$link_title = $pages[ 'title' ];
			$link_title_lowercase = strtolower($link_title);
			$new_link_title = str_replace(' ', '_', $link_title_lowercase);
			
			if ( strpos( $new_link_title, 'ă' ) ) {
			
				$new_link_title = str_replace( 'ă', 'a', $new_link_title );
			
			} 
			
			if( strpos( $new_link_title, 'î' ) ) {
			
				$new_link_title = str_replace( 'î', 'i', $new_link_title );
			
			} 
			
			if( strpos( $new_link_title, 'â' ) ) {
			
				$new_link_title = str_replace( 'â', 'a', $new_link_title );
			
			} 
			
			if( strpos( $new_link_title, 'ș' ) ) {
			
				$new_link_title = str_replace( 'ș', 's', $new_link_title );
			
			} 
			
			if( strpos( $new_link_title, 'ț' ) ) {
			
				$new_link_title = str_replace( 'ț', 't', $new_link_title );
			
			}
			
		}
		
		$pages[ 'link_title' ] = $new_link_title;
		
		if( $this->input->post( 'modules' ) != 'simple_page' ) {
		
			$pages[ 'content' ] = ""; 
			
		} else {
		
			$pages[ 'content' ] = $this->input->post( 'content' );
		   
		}
		
		if( $this->db->update( "ep_pages", $pages, array( 'id_page' => $id_page ) ) ) {
		
			echo 'success';
		
		} else {
		
			echo 'error';
		
		}
	}
	
	function page_delete($id_page) {
		$this->db->query("delete from pages where id_page = '".$id_page."' ");
		redirect("pages");
	}

}
