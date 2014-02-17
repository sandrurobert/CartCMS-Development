{TOP_NAV}

<div id="header" class="wrapper">

	<div class="logo">

		<a href="{BASE_URL}/dashboard" title="">
			<img src="{APP_URL}/images/loginLogo.png" alt="logo" />
		</a>

	</div><!-- .logo -->

	<div id = "notifications"></div><!-- #notifications -->

</div><!-- #header .wrapper -->

<div class="wrapper">

	<div class="leftNav">

		<ul id="menu">

			<li class = "dashboard">

				<a href="{BASE_URL}/dashboard" title="Dashboard">
					<span>Dashboard</span>
				</a>

			</li>

			<li class = "pages">

				<a href="{BASE_URL}/pages" title="Pages">
					<span>Pages</span>
				</a>

			</li>

			<li class = "modules exp">
				<a href="#" title="Modules">
					<span>Modules</span>
					<span class = "numberLeft">2</span>
				</a>

				<ul class="sub">

					<li>
						<a href="{BASE_URL}/blog" title="Blog">Blog</a>
					</li>

					<li class="last">
						<a href="{BASE_URL}/galleries" title="Gallery">Gallery</a>
					</li>

				</ul><!-- .sub -->

			</li>

			<li class = "settings exp">
				<a href="#" title="Settings">
					<span>Settings</span>
				</a>

				<ul class="sub">

					<li>
						<a href="{BASE_URL}/settings" title="General settings">General settings</a>
					</li>

					<li>
						<a href="{BASE_URL}/settings/account/{id_loggedUser}" title="Account settings">Account settings</a>
					</li>

					<li class="last">
						<a href="{BASE_URL}/settings/modules" title="Modules settings">Modules settings</a>
					</li>

				</ul><!-- .sub -->

			</li>

		</ul><!-- #menu -->

	</div><!-- .leftNav -->
