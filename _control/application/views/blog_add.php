<div class="success">
	<form action="{SITE_URL}/blog/post_add_process" method="post" class="mainForm" enctype="multipart/form-data">
    	<fieldset>
        	<div class="widget">
  		 		<div class="head"><h5>Add new post</h5></div>
 				<div class="rowElem nobg">
                	<label>Title:</label>
                    <div class="formRight">
                    	<input type="text" name="title" id="title"/>
                        <label class="error" id="titleError">This field is required</label>
                    </div>
                    <div class="fix"></div>
                </div>
           		<div class="rowElem nobg">
                	<label>Date:</label>
                    <div class="formRight">
                    	<input type="text" name="cdate" value="{curent_date}" id="cdate"/>
                        <label class="error" id="cdateError">This field is required</label>
                    </div>
                    <div class="fix"></div>
                </div>
            	<div class="rowElem nobg">
                	<label>Short Description:</label>
                    <div class="formRight">
                    	<input type="text" name="short" id="short"/>
                        <label class="error" id="shortError">This field is required</label>
                    </div>
                    <div class="fix"></div>
                </div>
            	<div class="rowElem">
                	<label>Upload image:</label> 
                	<div class="formRight">
                    	<input type="file" class="fileInput" id="fileInput" name="picture" />
                	</div>
                	<div class="fix"></div>
                </div>
                <div class="rowElem">
            		<label id="wysiwyg-content post">Description:</label><br />
           	 		<textarea name="content" class="wysiwyg" id="wysiwyg" rows="5" cols=""></textarea> 
                </div>               
        		<div class="rowElem">
            		<input type="submit" value="Submit" name="submit" id="submit" class="basicBtn submitForm" />
           			<div class="fix"></div>
           	    </div>
           </div>
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
		 
		 var short = $("input#short").val();
		 if(short == '') {
			 $("label#shortError").fadeIn();
			 return false;
		 }
		
 	 });  
	}); 
</script>
