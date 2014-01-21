<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main_admin_model extends CI_Model {


	/**
	 * main parser
	 */
	function getPage ( $header = 'header', $title = 'no_title', $body = 'body', $body_header = 'body_header', $top_nav = 'top_nav', $body_content = 'body_content', $content = 'no_content', $body_footer = 'body_footer' ) {
	
		/* ------- generate header ------- */
		$main_data[ 'HEADER' ] = $this->parser->parse( $header, array( 'page_title' => $title ), true );
		
		/* ------- generate content ------- */
		$top_nav_parsed = $this->load->view( $top_nav, '', true );
		$body_header_parsed = $this->parser->parse( $body_header, array( 'TOP_NAV' => $top_nav_parsed ), true );
		$body_content_parsed = $this->parser->parse( $body_content, array( 'CONTENT' => $content ), true );
		$body_footer_parsed = $this->load->view( $body_footer, '', true );
		
		$main_data[ 'BODY' ] = $this->parser->parse( $body, array( 
																'BODY_HEADER' => $body_header_parsed, 
																'BODY_CONTENT' => $body_content_parsed,
																'BODY_FOOTER' => $body_footer_parsed
															), true );
	
		return $main_data;
	
	}

}
