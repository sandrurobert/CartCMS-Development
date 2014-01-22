<form method="post" class="mainForm">

	<fieldset>
	
    <div class="widget first">
		
			<div class="head">
			
			  <h5>Edit "{title}" page</h5>
			
		  </div><!-- .head -->
			
    	<div class="rowElem nobg">
			
      	<label>Title <span class = "req" >*</span></label>
				
        <div class="formRight">
				
        	<input type="text" name="title" id="title" value="{title}"/>
					
        </div><!-- .formRight -->
				
        <div class="fix"></div>
				
      </div><!-- .rowElem -->
			
			<div class="rowElem nobg">
			
      	<label>Content Type</label>
				
				<div class="formRight noSearch">
				
					<select name="modules" class = "chzn-select" id = "modules" >
					
						{MODULES}
						<option value="{nickname}" {selected}>{name}</option>
						{/MODULES}
						
					</select>
					
				</div><!-- .formRight -->
				
			  <div class="fix"></div>
				
		  </div><!-- .rowElem -->
			
 	    <div id="normal_content">

      	<label id="wysiwyg-content">Content:</label>
      	<textarea name="content" class="wysiwyg" id="wysiwyg" rows="5" cols="">{content}</textarea>  
	
      </div><!-- #normal_content -->
			
	  </div><!-- .widget .first -->
		
    <div class="widget">
		
      <div class="head">
			
				<h5>Menu options</h5>
				
			</div><!-- .head -->
			
    	<div class="rowElem nobg">
			
      	<label>Page type</label>
				
      	<div class="formRight noSearch">
				
        	<select name="page_type"  class = "chzn-select" id = "page_type" >
					
         		<option value="1">Parent</option>
              {PAGE_TYPE}
          	<option value="{id_page}" {selected}>{title}</option>
              {/PAGE_TYPE}
						
        	</select>
					
       	</div><!-- .formRight -->
				
      	<div class="fix"></div>
				
     	</div><!-- .rowElem -->
			
    </div><!-- .widget -->
    		
    <div class = "widget">
			
			<div class="rowElem">
			
				<label class = "allRequired"> * Please fill in all the required fields.</label>
		
				<div class="formRight submitRight">
				
					<input type="submit" value="Submit" class="basicBtn edit" id = "editPages" />
				
				</div><!-- .formRight -->
				
				<div class="fix"></div>
				
			</div><!-- .rowElem -->
		
		</div><!-- .widget -->
		
 	</fieldset>
	
</form>

<script type = "text/javascript"> var id_page = '{id_page}'; </script>
