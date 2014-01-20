<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galleries extends CI_Controller {

	public function __construct() {
            parent::__construct();
			if($this->session->userdata('logged') == FALSE)
			 redirect("auth");
    }
	
	public function index() {
		$galleries = $this->db->query("select * from galleries")->result();
		$msg["msg"] = "You don`t have any gallery added.";
		if(empty($galleries))
		 $data['CONTENT'] = $this->parser->parse('gallery_empty',$msg,TRUE);
		  else
			$data['CONTENT'] = $this->parser->parse('gallery',array('GALLERIES'=>$galleries),TRUE);
		
		$data["TITLE"] = "Gallery";				
        $this->parser->parse('base_template',$data);
	}
	
	function gallery_add() {
		$gallery_add = date("Y-m-d");
		
		$data["TITLE"] = "Add new gallery";
		$data['CONTENT'] = $this->parser->parse('gallery_add',array('current_date'=>$gallery_add),TRUE);  				
        $this->parser->parse('base_template',$data);
	}
	
	function gallery_add_process() {
		$galleries["title"] = $this->input->post("title");
		$galleries["cdate"] = $this->input->post("cdate");
							
		if($this->db->insert("galleries",$galleries))
		 echo "yes";
		 	else
			 	echo "no";
	}
	
	function gallery_edit($id_gallery) {
		$gallery_info = $this->db->query("select * from galleries where id_gallery = '".$id_gallery."'")->row();
		
		$data["TITLE"] = "Edit a gallery";
		$data['CONTENT'] = $this->parser->parse('gallery_edit',$gallery_info,TRUE);  				
        $this->parser->parse('base_template',$data);
	}
	
	function gallery_edit_process($id_gallery) {
		$galleries["title"] = $this->input->post("title");
		$galleries["cdate"] = $this->input->post("cdate");
		
		if($this->db->update("galleries",$galleries, array("id_gallery"=>$id_gallery)))
			echo "yes";
			 	else
				 	echo "no";
	}
	
	function gallery_delete($id_gallery) {
		$gallery = $this->db->query("select * from galleries where id_gallery = '".$id_gallery."' ")->row();
		$photos->PHOTOS = $this->db->query("select * from photos where id_gallery = '".$gallery->id_gallery."' ")->result();
		foreach($photos->PHOTOS as $pht) {
			unlink("./uploads/" . $pht->link);
		}
		
		$this->db->query("delete from photos where id_gallery = '".$gallery->id_gallery."' ");
		$this->db->query("delete from galleries where id_gallery = '".$id_gallery."' ");
		redirect("galleries");
	}
	
	function photos($id_gallery) {
		$photos = $this->db->query("select * from photos where id_gallery = '".$id_gallery."'")->result();
		
		$data["TITLE"] = "Photos";
		$data['CONTENT'] = $this->parser->parse('photos',array('PHOTOS'=>$photos),TRUE);				
        $this->parser->parse('base_template',$data);
	}
	
	function photos_add ($id_gallery) {
		$msg = "Upload images";
		
		$data["TITLE"] = "Add photos";
		$data['CONTENT'] = $this->parser->parse('photos_add',array('tit'=>$msg, 'id_gallery'=>$id_gallery),TRUE);  				
        $this->parser->parse('base_template',$data);
	}
	
	function photos_add_process($id_gallery) {		
		// HTTP headers for no cache etc
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		
		// Settings
		$targetDir = './uploads/';
		
		// 5 minutes execution time
		@set_time_limit(5 * 60);
		
		// Get parameters
		$chunk = isset($_REQUEST["chunk"]) ? $_REQUEST["chunk"] : 0;
		$chunks = isset($_REQUEST["chunks"]) ? $_REQUEST["chunks"] : 0;
		$fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';
		
		// Clean the fileName for security reasons
		$fileName = preg_replace('/[^\w\._]+/', '', $fileName);
		
		// Make sure the fileName is unique but only if chunking is disabled
		if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName)) {
			$ext = strrpos($fileName, '.');
			$fileName_a = substr($fileName, 0, $ext);
			$fileName_b = substr($fileName, $ext);
		
			$count = 1;
			while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
				$count++;
		
			$fileName = $fileName_a . '_' . $count . $fileName_b;
		}
		
		// Create target dir
		if (!file_exists($targetDir))
			@mkdir($targetDir);
		
		// Look for the content type header
		if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
			$contentType = $_SERVER["HTTP_CONTENT_TYPE"];
		
		if (isset($_SERVER["CONTENT_TYPE"]))
			$contentType = $_SERVER["CONTENT_TYPE"];
		
		// Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
		if (strpos($contentType, "multipart") !== false) {
			if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
				// Open temp file
				$out = fopen($targetDir . DIRECTORY_SEPARATOR . $fileName, $chunk == 0 ? "wb" : "ab");
				if ($out) {
					// Read binary input stream and append it to temp file
					$in = fopen($_FILES['file']['tmp_name'], "rb");
		
					if ($in) {
						while ($buff = fread($in, 4096))
							fwrite($out, $buff);
					} else
						die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
					fclose($in);
					fclose($out);
					@unlink($_FILES['file']['tmp_name']);
				} else
					die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
			} else
				die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
		} else {
			// Open temp file
			$out = fopen($targetDir . DIRECTORY_SEPARATOR . $fileName, $chunk == 0 ? "wb" : "ab");
			if ($out) {
				// Read binary input stream and append it to temp file
				$in = fopen("php://input", "rb");
		
				if ($in) {
					while ($buff = fread($in, 4096))
						fwrite($out, $buff);
				} else
					die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
		
				fclose($in);
				fclose($out);
			} else
				die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		}
		
		for($i = 1; $i <= count($fileName); $i++) {
			$targetDir = './uploads/';
			$path = $targetDir . $fileName;
			
			$config['image_library'] = 'gd2';
			$config['source_image'] = $path;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 150;
			$config['height'] = 90;
				
			$this->load->library('image_lib', $config);
				
			$this->image_lib->resize();
			
			$photo["id_gallery"] = $this->uri->segment(3);
			$photo["link"] = $fileName;
			$pieces = explode('.', $fileName);
			$file_name =  $pieces[0] . "_thumb." . $pieces[1];
			$photo["link_thumb"] = $file_name; // not done
								
			$this->db->insert("photos",$photo);
		}
		// Return JSON-RPC response
		die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
	}
	
	function photo_delete ($id_gallery, $id_photo) {
		$photo = $this->db->query("select * from photos where id_photo = '".$id_photo."' ")->row();
		unlink("./uploads/" . $photo->link);
		
		$this->db->query("delete from photos where id_photo = '".$id_photo."' ");
		redirect("galleries/photos/" . $id_gallery);
	}

}
