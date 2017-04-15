<div class="container">
	<legend id="core-template" class="col-md-12">
		<ul class="nav nav-tabs"  data-tabs="tabs">
		  <?php
		  $temp ='';
		  foreach ($Tabs as $item) {
		  	$Addclass = ($item['position'] == 'right') ? ' pull-right ':'';
		  	$temp .='<li data-id="'.$item['id'].'"  class="'.$item['class'].$Addclass.'" ><a data-toggle="tab" href="#wcifx-tabs">'.$item['title'].'</a></li>';
		  }
		  echo $temp;
		  ?>
		</ul>
		<div id="tabs-content">
			
		</div>
	</legend>
</div>
