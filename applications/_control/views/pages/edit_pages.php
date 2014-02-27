<form action = "{BASE_URL}/pages/edit_process/{id_page}" method="post" class="mainForm">

	<fieldset>

    <div class="widget first">

			<div class="head">

			  <h5>{lang_edit_page}{title}</h5>

		  </div><!-- .head -->

    	<div class="rowElem nobg">

      	<label>{lang_title_field}<span class = "req" >*</span></label>

        <div class="formRight">

        	<input type="text" name="title" id="title" value="{title}"/>

        </div><!-- .formRight -->

        <div class="fix"></div>

      </div><!-- .rowElem -->

			<div class="rowElem nobg">

      	<label>{lang_content_type_field}</label>

				<div class="formRight noSearch">

					<select name="modules" class = "chzn-select" id = "modules" >

						{MODULES}
						<option value="{nickname}" {selected}>{name}</option>
						{/MODULES}

					</select>

				</div><!-- .formRight -->

			  <div class="fix"></div>

		  </div><!-- .rowElem -->

 	    <div id="normal_content">

      	<label id="wysiwyg-content">{lang_content_field}</label>
      	<textarea name="content" class="wysiwyg" id="wysiwyg" rows="5" cols="">{content}</textarea>

      </div><!-- #normal_content -->

	  </div><!-- .widget .first -->

    <div class="widget">

      <div class="head">

				<h5>{lang_menu_options}</h5>

			</div><!-- .head -->

    	<div class="rowElem nobg">

      	<label>{lang_page_type_field}</label>

      	<div class="formRight noSearch">

        	<select name="page_type"  class = "chzn-select" id = "page_type" >

         		<option value="1">{lang_default_page_type_value}</option>
            <option value="0">{lang_empty_page_type_value}</option>
              {PAGE_TYPE}
          	<option value="{id_page}" {selected}>{title}</option>
              {/PAGE_TYPE}

        	</select>

       	</div><!-- .formRight -->

      	<div class="fix"></div>

     	</div><!-- .rowElem -->

    </div><!-- .widget -->

    <div class = "widget">

			<div class="rowElem">

				<label class = "allRequired"> * {lang_required_fields}</label>

				<div class="formRight submitRight">

					<input type="submit" value="{lang_submit_form}" class="basicBtn edit" id = "submitPages" />

				</div><!-- .formRight -->

				<div class="fix"></div>

			</div><!-- .rowElem -->

		</div><!-- .widget -->

 	</fieldset>

</form>
