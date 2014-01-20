<!-- - - - - - - - - - - - - - Page Header - - - - - - - - - - - - - - - -->		

<section class="page-header">
	
	<div class="container">
		
		<h1>{page_title}</h1>
		
	</div><!--/ .container-->
	
</section><!--/ .page-header-->

<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
	
<section class="main container sbr clearfix">	
		
	<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
	 
	<section id="content" class="ten columns">
		{NEWS}
		<article class="entry">
			
			<div class="bordered">
				<figure class="add-border">
					<a class="single-image" href="{SITE_URL}/website/post/{link_title}">
						<img src="{BASE_URL}/admin/uploads/{picture_link}" alt="Picture" width="580" height="270" class="default" />
					</a>
				</figure>
			</div><!--/ .bordered-->
			
			<div class="entry-meta">
				
				<span class="date">{day}</span>
				<span class="month">{month}</span>

			</div><!--/ .entry-meta-->

			<div class="entry-body">
				
				<div class="entry-title">

					<h2 class="title"><a href="{SITE_URL}/website/post/{link_title}">{title}</a></h2>
					
				</div><!--/ .entry-title-->					

				<p>
					{short}
				</p>
				
				<a href="{SITE_URL}/website/post/{link_title}" class="button default small">Mai multe...</a>

			</div><!--/ .entry-body -->

		</article><!--/ .entry-->
		{/NEWS}
		<div class="wp-pagenavi clearfix">

			<span class="pages">Page 1 of 3</span>
			<a class="prevpostslink" href="#">Previous</a>
			<span class="current">1</span>
			<a class="page" href="#">2</a>
			<a class="page" href="#">3</a>
			<a class="nextpostslink" href="#">Next</a>

		</div><!--/ .wp-pagenavi-->
		
	</section><!--/ #content-->
	
	<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->
	
	{SIDEBAR}
		
</section><!--/ .main -->

<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->			
