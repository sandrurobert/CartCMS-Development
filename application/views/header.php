<header id="header">

	<div class="container">

		<!-- - - - - - - - - - - - Logo - - - - - - - - - - - - - -->

		<div id="logo">

			<div id = "logo-img">

				<img src="{BASE_URL}/_control/uploads/{logo}" alt="Logo" title="Logo" />

			</div><!--/ #logo-img-->

			<div id = "logo-text">

				<h1>{websiteTitle}</h1>

			</div><!--/ #logo-text-->

		</div><!--/ #logo-->

		<!-- - - - - - - - - - - end Logo - - - - - - - - - - - - -->

		<div class="clear"></div>

		<!-- - - - - - - - - - - - - Navigation - - - - - - - - - - - - - - -->

		<nav id="navigation" class="navigation clearfix">

			<ul class="clearfix">
				{NAV}
				<li><a href="{page_link}">{title}</a>
					<ul class="subMenu">
						{S_NAV}
						<li><a href="{s_page_link}">{s_title}</a></li>
						{/S_NAV}
					</ul>
				</li>
				{/NAV}
			</ul>

		</nav><!--/ #navigation-->

		<!-- - - - - - - - - - - - end Navigation - - - - - - - - - - - - - -->

	</div><!--/ .container-->

</header><!--/ #header-->
