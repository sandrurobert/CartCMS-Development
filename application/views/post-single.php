<!-- - - - - - - - - - - - - - Page Header - - - - - - - - - - - - - - - -->		

<section class="page-header">
	
	<div class="container">
		
		<h1>{post_title}</h1>
		
	</div><!--/ .container-->
	
</section><!--/ .page-header-->

<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
	
<section class="main container sbr clearfix">	
		
	<!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->
	 
	<section id="content" class="ten columns">
		
		<article class="entry">
			
			<div class="bordered">
				<figure class="add-border">
					<img src="{BASE_URL}/admin/uploads/{picture_link}" alt="Post Image" />
				</figure>
			</div><!--/ .bordered-->
			
			<div class="entry-meta">
				
				<span class="date">{day}</span>
				<span class="month">{month}</span>

			</div><!--/ .entry-meta-->

			<div class="entry-body">
				
				<div class="entry-title">

					<h2 class="title">{title}</h2>
					
				</div><!--/ .entry-title-->					

				<p>
					{content}
				</p>
			</div><!--/ .entry-body -->

		</article><!--/ .entry-->

	</section><!--/ #content-->
	
	<!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->
	
	{SIDEBAR}
		
</section><!--/ .main -->

<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->			
