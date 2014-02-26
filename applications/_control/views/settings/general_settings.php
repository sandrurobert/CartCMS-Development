<form action="{BASE_URL}/settings/general_process" method="post" class="mainForm" enctype="multipart/form-data">

	<fieldset>

    	<div class="widget first">

  			<div class="head">
				<h5>{lang_page_title}</h5>
			</div><!-- .head -->

			<div class="rowElem nobg">

				<label>{lang_website_title}</label>

				<div class="formRight">
					<input type="text" name="website_title" value="{website_title}" />
				</div><!-- .formRight -->

				<div class="fix"></div>

			</div><!-- .rowElem -->

			<div class="rowElem">

				<label>{lang_website_logo}</label>

				<div class="formRight">

					<div class="pics single">

					   <ul>

							<li>

								<a href="#" title="{lang_website_logo}" class = "img">
									<img src="{BASE_URL}/uploads/{website_logo}" alt="" />
								</a>

								<div class="actions">
									<a href="#" title="">
										<img src="{BASE_URL}/img/edit.png" alt="" />
										<input type = "file" name = "website_logo" class = "default" />
									</a>
								</div>

							</li>

						</ul>

					</div><!-- .pics -->

				</div><!-- .formRight -->

				<div class="fix"></div>

			</div><!-- .rowElem -->

			<div class="rowElem">

				<label>{lang_website_copyright}</label>

				<div class="formRight">
					<input type="text" name="website_copyright" value="{website_copyright}" />
				</div><!-- .formRight -->

				<div class="fix"></div>

			</div><!-- .rowElem -->

			<div class="rowElem">

				<input type="submit" value="Submit" id="submit" class="basicBtn submitForm" />

				<div class="fix"></div>

			</div><!-- .rowElem -->

		</div><!-- .widget .first -->

  </fieldset>

</form>