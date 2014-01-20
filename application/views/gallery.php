<!-- - - - - - - - - - - - - - Page Header - - - - - - - - - - - - - - - -->		

<section class="page-header">
	
	<div class="container">
		
		<h1>{TITLE}</h1>
		
	</div><!--/ .container-->
	
</section><!--/ .page-header-->

<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
	
<section class="main container clearfix">	
	
	<!-- - - - - - - - - Portfolio Filter - - - - - - - - - - - -->	
		
	<ul id="portfolio-filter" class="portfolio-filter">

		<li><a data-categories="*">All</a></li>
		{GALLERY}
			<li><a data-categories="{title}">{title}</a></li>
        {/GALLERY}

	</ul><!--/ #portfolio-filter -->
	
	<!-- - - - - - - - end Portfolio Filter - - - - - - - - - - -->	
	
	<section id="gallery" class="gallery">
		{PHOTOS}
		<article class="eight columns" data-categories="{title}">
			
			<div class="project-thumb">
				
				<div class="bordered">
					<figure class="add-border">
						<a class="single-image picture-icon" rel="gallery" href="{BASE_URL}/admin/uploads/{link}">
							<img src="{BASE_URL}/admin/uploads/{link_thumb}" alt="{title}" class="default" />
						</a>
					</figure>
				</div><!--/ .bordered-->
				
			</div><!--/ .project-thumb-->

		</article><!--/ .eight-->
		{/PHOTOS}
	</section><!--/ #portfolio-items-->

</section><!--/ .main -->


<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->			


