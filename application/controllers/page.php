<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
	
    function __construct() {
	
        parent::__construct();

        $this -> load -> model( 'main_model' );
		
    }
	
	function _remap( $link_title ) {
	
		$this -> index( $link_title );
	
	}
	
	/* -------------- PAGES -------------- */
	function index ( $link_title ) {
	
		$page_info = $this -> db -> query(" select * from ep_pages where link_title = '" . $link_title . "' ") -> row();
		
		if ( $page_info -> module == 'simple_page' ) {
		
			$content = $this -> parser -> parse( 'simple_page', $page_info, TRUE );
		
		} else {
		
			$content = $this -> load -> model( $page_info -> module );
		
		}
		
		$title = $page_info -> title;
		$meta_descr = $page_info -> meta_descr;
		$meta_key = $page_info -> meta_key;
		$header = $this -> main_model -> getHeader();
		$footer = $this -> main_model -> getFooter();
		
		$main_data = $this -> main_model -> getParse( $title, $header, $content, $footer, $meta_descr, $meta_key );
		
        $this -> parser -> parse( 'base_template', $main_data );
		
	}
	
	/* -------------- POSTS -------------- */
	function post ( $post_title_link ) {
	
		$post_content = $this -> db -> query("select * from posts where link_title = '" . $post_title_link[ 0 ] . "' ") -> row();
		
		$explode_date = explode( '-', $post_content -> cdate );
		$day = $explode_date[ 2 ];
		$month = $explode_date[ 1 ];
		
		$title = $post_content -> title;
		$header = $this -> getNavi();
		$sidebar = $this -> getSidebar();
		$sidebar_parse = $this -> parser -> parse( 'sidebar', array( 'LATEST_NEWS' => $side_posts ), TRUE );
		$content = $this -> parser -> parse( 'post-single', array( 
																	'SIDEBAR' => $sidebar_parse, 
																	'title' => $title, 
																	'day' => $day, 
																	'month' => $month,
																	'picture_link' => $post_content -> picture_link, 
																	'content' => $post_content -> content
																  ), TRUE);
		$footer = $this -> getFooter();
		
		$main_data = getParse( $title, $header, $content, $footer );
		
        $this -> parser -> parse( 'base_template', $main_data );
		
	}
	
	function search () {
		$results = $this->input->post("search");
		$posts = $this->db->query("select * from posts where title like '%$results%'")->result();
		
		$nav = $this->db->query("select * from pages where page_type = '1' ")->result();
		foreach($nav as $menu) {
			$menu->page_link = site_url() . "/website/pages/" . $menu->id_page;
			
			if($menu->title == 'Home')
				$menu->page_link = site_url();
		}
		$side_bar_posts = $this->db->query("select * from posts order by cdate asc LIMIT 5")->result();
		$side_bar = $this->parser->parse('side_bar',array('SIDE_POSTS'=>$side_bar_posts),TRUE);
		$data["TITLE"] = "Home";
		$data["NAVIGATION"] = $this->parser->parse('navigation',array('PAGES'=>$nav),TRUE);
        $data['CONTAINER'] = $this->parser->parse('blog',array('POSTS'=>$posts, 'SIDEBAR'=>$side_bar),TRUE);
		$data['meta_descr'] = "This is a website with police photos, news and information.";
		$data['meta_key'] = "police, cops, news, pictures";
        $this->parser->parse('base_template',$data);
	}
	
	function contact () {
		$name = $this->input->post("name");
		$sender = $this->input->post("email");
		$message = $this->input->post("message");
		
		$header  = "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$header .= "From: Police Website contact <contact@police.com>\r\n";
		$header .= "Reply-To: ".$sender."\r\n";
	
		$email = 'yox64@yahoo.com';
		
		$date = date('D d, F Y');
		
		$src = '
			<html>
			<head>
			   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			   <title>Police Website contact</title>
			   <style type="text/css" media="screen">
				  body {
					margin: 0;
					padding: 0;
				  }

				  a {
					color: #cc0000;
				  }

				  span.date{
					font-family: Georgia;
					font-size: 12px;
					font-weight: normal;
					color: #999999;
					margin: 0;
					padding: 0;
					display:block;
					text-transform: uppercase;
				  }
					
				img {
					margin:0 5px 0 0;
					padding:0px;
					float:left;
					border:4px solid #eaeaea;
				}
					
				 span.name {
					font-family: Georgia;
					font-size:22px;
					font-weight: normal;
					color: #000000;
					padding:0;
					margin:0;
				  }

				  p {
					font-family: Georgia;
					font-size: 13px;
					font-weight: normal;
					color: #333333;
					margin: 0 0 20px 0;
					padding: 0;
				  }

				  td.mainbar p.top a {
					font-family: Georgia;
					font-size: 10px;
					font-weight: normal;
					color: #cc0000;
				  }

				  td.footer {
					font-family: Georgia;
					font-size: 11px;
					font-weight: normal;
					color: #333333;
					padding: 10px 0 10px 0;
				  }

				  td.footer span {
					font-weight: bold;
				  }
			   </style>

			</head>
			<body>

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			   <tr>
				  <td align="center">
					 
					 <table width="580" border="0" cellspacing="0" cellpadding="0">
						<tr>
						   <td>
							  
							  <table width="580" border="0" cellspacing="20" cellpadding="0">
								 
								 <tr>
									<td width="580" align="left" valign="top" class="mainbar">

									   <p>
											<span class="name">'.$name.'</span>
											<span class="date">'.$date.'</span>
										</p>
										
										<p>'.$message.'</p>
										<p style="text-align:right;"><a href="#">E-mail : '.$sender.'</a></p>
									</td>
								 </tr>
							  </table>
							  
						   </td>
						</tr>
					 </table>
					 
				  </td>
			   </tr>
			</table>

			</body>
			</html>
			';
			
		$success = mail($email, "Police Website contact - ".$name, $src, $header);
		if($success)
		 echo "yes";
	}
	
	
	/* -------------- CONTENT -------------- */
	public function getContent ( $content_type, $content, $page_title ) {
	
		//homepage
		if ( $content_type == 5 ) {
		
			$latest_news = $this -> db -> query(" select * from ep_posts order by cdate desc limit 3 ") -> result();
											
			$content = $this -> parser -> parse( 'home', array( 'NEWS' => $latest_news ), TRUE );
			
		}
		//galleries
		if ( $content_type == 2 ) {
		
			$gallery = $this -> db -> query(" select * from ep_photo_galleries order by cdate desc ") -> result();
			$photos = $this -> db -> query(" select ep_photo_galleries.*,  ep_photos.*
												from ep_photo_galleries
												left join ep_photos on ep_photo_galleries.id_gallery = ep_photos.id_gallery ") -> result();
											
			$content = $this -> parser -> parse( 'gallery', array( 'GALLERY' => $gallery, 'PHOTOS' => $photos ), TRUE );
		}
		
		//blog
		if( $content_type == 1 ) {
		
			$posts = $this -> db -> query(" select * from ep_posts order by cdate desc ") -> result(); 
			
			foreach ( $posts as $post ) {
			
				$explode_date = explode( '-', $post -> cdate);
				$post -> day = $explode_date[ 2 ];
				$post -> month = $explode_date[ 1 ];
				
			}
			
			$sidebar = $this -> getSidebar();
			$sidebar_parse = $this -> parser -> parse( 'sidebar', array( 'LATEST_NEWS' => $sidebar ), TRUE );
			
			$content = $this -> parser -> parse( 'posts', array( 'NEWS' => $posts, 'SIDEBAR' => $sidebar_parse, 'page_title' => $page_title ), TRUE );
			
		}
		
		//normal
		if( $content_type == 3 ) {
		
			$content = $this -> parser -> parse( 'normal', array( 'content' => $content, 'page_title' => $page_title ), TRUE );
			
		}
		
		//contact
		if( $content_type == 4 ) {
		
			$content = $this->load->view( 'contact', '', TRUE );
			
		}
		
		return $content;
	
	}
	
	
}
