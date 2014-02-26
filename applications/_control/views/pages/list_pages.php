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

					<a href="{BASE_URL}/pages/edit/{id_page}">

						<button class="blackBtn" >{lang_edit_column}</button><!-- .blackBtn -->

					</a>

				</td>
      	<td>

					<button class="redBtn bConfirm" id = "{id_page}" >{lang_delete_column}</button><!-- .redBtn -->

				</td>

    	</tr>
			{/PAGES}

   	</tbody>

	</table>

</div><!-- .widget .first -->

<a href="{BASE_URL}/pages/add">

	<button class="blueBtn add" >{lang_add_page}</button><!-- .blueBtn -->

</a>
