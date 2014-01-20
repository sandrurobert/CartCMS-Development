<div class="widget first">

	<div class="head">
	
		<h5 class="iFrames">Pages</h5>
		
	</div><!-- .head -->
	
	<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic resize">
	
    	<thead>
		
        	<tr>
			
            	<td width="80%">Title</td>
            	<td>Edit</td>
            	<td>Delete</td>
				
        	</tr>
			
    	</thead>
		
     	<tbody>
		
			{PAGES}
        	<tr>
			
            	<td>{title}</td>
            	<td>
				
					<a href="{SITE_URL}/pages/edit/{id_page}">
					
						<button class="blackBtn" > edit </button><!-- .blackBtn -->
					
					</a>
				
				</td>
            	<td>
				
					<a href="{SITE_URL}/pages/page_delete/{id_page}" class = "deleteBtn">
					
						<button class="redBtn" > delete </button><!-- .redBtn -->
					
					</a>
					
				</td>
				
        	</tr>
			{/PAGES}
		
     	</tbody>
		
	</table>
	
</div><!-- .widget .first -->

<a href="{SITE_URL}/pages/add">

	<button class="blueBtn add" > Add pages </button><!-- .blueBtn -->
	
</a>
