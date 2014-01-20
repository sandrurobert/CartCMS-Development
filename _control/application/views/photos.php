<div class="widget">
 <div class="head"><h5 class="iFrames">Photos</h5></div>
	<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic resize">
    	<thead>
        	<tr>
            	<td width="90%">Link name</td>
            	<td>Delete</td>
        	</tr>
    	</thead>
     	<tbody>
        {PHOTOS}
        	<tr>
            	<td>{link}</td>
            	<td><a href="{SITE_URL}/galleries/photo_delete/{id_gallery}/{id_photo}">delete</a></td>
        	</tr>
        {/PHOTOS}
     	</tbody>
	</table>
</div>
