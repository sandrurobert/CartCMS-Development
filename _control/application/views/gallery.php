<div class="widget first">
 <div class="head"><h5 class="iFrames">Galleries</h5></div>
	<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic resize">
    	<thead>
        	<tr>
            	<td width="70%">Title</td>
                <td width="13%">Add Photos</td>
            	<td>Edit</td>
            	<td>Delete</td>
        	</tr>
    	</thead>
     	<tbody>
        {GALLERIES}
        	<tr>
            	<td><a href="{SITE_URL}/galleries/photos/{id_gallery}">{title}</a></td>
                <td><a href="{SITE_URL}/galleries/photos_add/{id_gallery}">add photos</a></td>
            	<td><a href="{SITE_URL}/galleries/gallery_edit/{id_gallery}">edit</a></td>
            	<td><a href="{SITE_URL}/galleries/gallery_delete/{id_gallery}">delete</a></td>
        	</tr>
        {/GALLERIES}
     	</tbody>
	</table>
 </div>
 <div class="add"><a href="{SITE_URL}/galleries/gallery_add">Add</a></div>
</div>
