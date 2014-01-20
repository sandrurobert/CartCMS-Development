<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct() {
            parent::__construct();
			if($this->session->userdata('logged') == FALSE)
			 redirect("auth");
    }
	
	public function index() {
		$posts = $this->db->query("select * from posts")->result();
		$msg["msg"] = "You don`t have any post added.";
		if(empty($posts))
		 $data['CONTENT'] = $this->parser->parse('blog_empty',$msg,TRUE);
		  else
			$data['CONTENT'] = $this->parser->parse('blog',array('POSTS'=>$posts),TRUE);  
		
		$data["TITLE"] = "Blog";				
        $this->parser->parse('base_template',$data);
	}
	
	function post_add() {
		$post_add["curent_date"] = date("Y-m-d");
		
		$data["TITLE"] = "Add new post";
		$data['CONTENT'] = $this->parser->parse('blog_add',$post_add,TRUE);  				
        $this->parser->parse('base_template',$data);
	}
	
	function post_add_process() {
		$posts["title"] = $this->input->post("title");
		$posts["cdate"] = $this->input->post("cdate");
		$posts["short"] = $this->input->post("short");
		$posts["content"] = $this->input->post("content");
		
		$link_title = $posts["title"];
		$link_title_lowercase = strtolower($link_title);
		$new_link_title = str_replace(' ', '_', $link_title_lowercase);
		$posts["link_title"] = $new_link_title;
	
		$path = './uploads/';
		$random = rand() . ".jpg";
		$path = $path . $random;
		
		if(!move_uploaded_file($_FILES['picture']['tmp_name'], $path))
		 echo "error";
		
		$config['image_library'] = 'gd2';
		$config['source_image'] = $path;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 580;
		$config['height'] = 270;
		
		$this->load->library('image_lib', $config);
		
		$this->image_lib->resize();
		
		$pieces = explode('.', $random);
		$file_name =  $pieces[0] . "_thumb." . $pieces[1];
		
		$posts["picture_link"] = $file_name;
		
		if($this->db->insert("posts",$posts))
		 redirect("blog");
	}
	
	function post_edit($id_post) {
		$post_info = $this->db->query("select * from posts where id_post = '".$id_post."'")->row();
		
		$data["TITLE"] = "Edit a post";
		$data['CONTENT'] = $this->parser->parse('blog_edit',$post_info,TRUE);  				
        $this->parser->parse('base_template',$data);
	}
	
	function post_edit_process($id_post) {
		$posts["title"] = $this->input->post("title");
		$posts["cdate"] = $this->input->post("cdate");
		$posts["short"] = $this->input->post("short");
		$posts["content"] = $this->input->post("content");
		
		$link_title = $posts["title"];
		$link_title_lowercase = strtolower($link_title);
		$new_link_title = str_replace(' ', '_', $link_title_lowercase);
		$posts["link_title"] = $new_link_title;
		
		$page_info = $this->db->query("select * from posts where id_post = '".$id_post."'")->row();
		if ($_FILES['picture']['name'] == '')
			$posts["picture_link"] = $this->input->post("pictureInput");
		 		else {
					unlink('./uploads/'.$page_info->img);
					
					$path = './uploads/';
					$random = rand() . ".jpg";
					$path = $path . $random;
					
					if(!move_uploaded_file($_FILES['picture']['tmp_name'], $path))
					 echo "error";
									
					$posts["picture_link"] = $random;
					
					$config['image_library'] = 'gd2';
					$config['source_image'] = $path;
					$config['create_thumb'] = TRUE;
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 580;
					$config['height'] = 270;
					
					$this->load->library('image_lib', $config);
					
					$this->image_lib->resize();
					
					$posts["picture_link"] = $file_name;	
			}
		
		if($this->db->update("posts",$posts, array("id_post"=>$id_post)))
			redirect("blog");
	}
	
	function post_delete($id_post) {
		$post = $this->db->query("select * from posts where id_post = '".$id_post."' ")->row();
		unlink("./uploads/" . $post->picture_link);
		
		$this->db->query("delete from posts where id_post = '".$id_post."' ");
		redirect("blog");
	}

}
