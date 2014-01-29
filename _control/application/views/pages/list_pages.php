<div class="widget first">

	<div class="head">
	
		<h5 class="iFrames">{lang_page_title}</h5>
		
	</div><!-- .head -->
	
	<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic resize">
	
  	<thead>
		
    	<tr>
			
      	<td width="80%">{lang_title_column}</td>
      	<td>{lang_edit_column}</td>
      	<td>{lang_delete_column}</td>
				
    	</tr>
			
  	</thead>
		
   	<tbody>
		
			{PAGES}

    	<tr>
			
      	<td>{title}</td>
      	<td>
				
					<a href="{SITE_URL}/pages/edit/{id_page}">
					
						<button class="blackBtn" >{lang_edit_column}</button><!-- .blackBtn -->
					
					</a>
				
				</td>
      	<td>
				
					<a href="{SITE_URL}/pages/page_delete/{id_page}" class = "deleteBtn">
					
						<button class="redBtn bConfirm" >{lang_delete_column}</button><!-- .redBtn -->
					
					</a>
					
				</td>
				
    	</tr>
			{/PAGES}
		
   	</tbody>
		
	</table>
	
</div><!-- .widget .first -->

<a href="{SITE_URL}/pages/add">

	<button class="blueBtn add" >{lang_add_page}</button><!-- .blueBtn -->
	
</a>
