<a href="<?php echo site_url('admin/web-content/add-post/').$postType;?>" class="add-new btn btn-primary">Add new</a>
<?php echo $message ;?>
<table class="wcifx-datatable table table-bordered" data-controller='web-content' data-method='datatable/<?php echo $postType;?>' >
<thead>
	<tr>
		<?php 
		$temp = '';
		foreach($datatableField as $th){
			$temp .= '<th>'.$th.'</th>';
		}
		echo $temp;
		?>
	</tr>
</thead>
<tbody>
</tbody>
</table>