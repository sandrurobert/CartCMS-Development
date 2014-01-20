<div class="widget first">    
	<div class="head"><h5 class="iUpload">{tit}</h5></div>
	<div id="uploader">You browser doesn't have HTML 4 support.</div>                    
</div>

<script type="text/javascript">	
	$("#uploader").pluploadQueue({
		runtimes : 'html5,html4',
		url : '{SITE_URL}/galleries/photos_add_process/{id_gallery}',
		max_file_size : '2mb',
		unique_names : true,
		filters : [
			{title : "Image files", extensions : "jpg,gif,png"},
			{title : "Zip files", extensions : "zip"}
		]
	});
</script>
