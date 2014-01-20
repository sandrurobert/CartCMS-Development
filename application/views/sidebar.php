<!-- - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - - -->	

<aside id="sidebar" class="one-third column">
	
	<div class="widget widget_search">
		
		<form action="{SITE_URL}/website/search" method="post" id="searchform" />
			
			<fieldset>
				
				<input type="text" />
			
				<button type="submit" title="Cauta">Cauta</button>	
			
			</fieldset>
			
		</form><!--/ #searchform-->
		
	</div><!--/ .widget-->
	
	<div class="widget widget_popular_posts">
		
		<h3 class="widget-title">Ultimele noutati</h3>
		
		<ul>
			{LATEST_NEWS}
			<li>
				<div class="bordered alignleft">
					<figure class="add-border">
						<a class="single-image" href="{SITE_URL}/website/post/{link_title}">
							<img src="{BASE_URL}/admin/uploads/{picture_link}" alt="Mini Picture" width="64" height="64" class="default" />
						</a>
					</figure>
				</div><!--/ .bordered-->						
				<h6><a href="#">{short}</a></h6>
				<div class="entry-meta">{cdate}</div>
			</li>
			{/LATEST_NEWS}
		</ul>
		
	</div><!--/ .widget-->
	
</aside><!--/ #sidebar-->

<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - -->				
