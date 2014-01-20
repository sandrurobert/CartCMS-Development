<div class="success">
<form method="post" class="mainForm">
	<fieldset>
    	<div class="widget first">
  			<div class="head"><h5>Edit a gallery</h5></div>
 				<div class="rowElem nobg">
                	<label>Title (no spaces):</label>
                    <div class="formRight">
                    	<input type="text" name="title" id="title" value="{title}"/>
                        <label class="error" id="titleError">This field is required</label>
                    </div>
                    <div class="fix"></div>
                </div>
           		<div class="rowElem nobg">
                	<label>Date:</label>
                    <div class="formRight">
                    	<input type="text" name="cdate" value="{cdate}" id="cdate"/>
                        <label class="error" id="cdateError">This field is required</label>
                    </div>
                    <div class="fix"></div>
                </div>
                
        		<div class="rowElem">
        			<input type="submit" value="Submit" id="submit" class="basicBtn submitForm" />
        		<div class="fix"></div>
                
   	</fieldset>
</form>
</div>
<script language="javascript">
	$(function() {  
	 $("label.error").hide();
	 
 	 $("#submit").click(function() { 
	     $("label.error").hide();
		 
   		 var title = $("input#title").val();
		 if(title == '') {
			 $("label#titleError").fadeIn();
			 return false;
		 }
		 
		 var cdate = $("input#cdate").val();
		 if(cdate == '') {
			 $("label#cdateError").fadeIn();
			 return false;
		 }
		
		$.post("{SITE_URL}/galleries/gallery_edit_process/{id_gallery}", 
		       { title: $('input#title').val(), cdate: $('input#cdate').val() },
		 function(data){ 
				if (data == 'yes')
					$('div.success').html("<p style='text-align:center;'>Gallery edited successfully<br /><a href='{SITE_URL}/galleries/gallery_add'>Add a new gallery</a></p>");					
			});
	 return false;
 	 });  
	}); 
</script>
