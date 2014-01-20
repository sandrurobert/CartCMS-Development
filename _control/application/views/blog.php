<div class="widget first">
 <div class="head"><h5 class="iFrames">Blog</h5></div>
	<table cellpadding="0" cellspacing="0" width="100%" class="tableStatic resize">
    	<thead>
        	<tr>
            	<td width="80%">Title</td>
            	<td>Edit</td>
            	<td>Delete</td>
        	</tr>
    	</thead>
     	<tbody>
        {POSTS}
        	<tr>
            	<td>{title}</td>
            	<td><a href="{SITE_URL}/blog/post_edit/{id_post}">edit</a></td>
            	<td><a href="{SITE_URL}/blog/post_delete/{id_post}">delete</a></td>
        	</tr>
        {/POSTS}
     	</tbody>
	</table>
 </div>
 <div class="add"><a href="{SITE_URL}/blog/post_add">Add</a></div>
</div>

