<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset = utf-8>
	<meta content = "IE=edge" http-equiv = X-UA-Compatible>
	<meta content = "width=device-width,initial-scale=1" name = viewport>
	<meta name = description content = ""> 
	<meta name = author content = "Ronald Hariyanto">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('dist/styles/main.css');?>">
  </head>
  <body>
  	<div class="container">
        <div style="margin-top:240px;" class="col-md-8 col-md-offset-2">
	  		<div class = "panel panel-primary">
			   	<div class = "panel-heading">
			      	<h2 class = "text-center">WCIFX INSTALL PAGE	</h2>
			   	</div>
			   	<div class = "panel-body">
					<form method="post" action="<?php echo site_url('install/do-install');?>" class="col-md-6">
						<?php csrfToken()?>
				  		<h2 class="text-center">install</h2>
				  		<div class="form-group">
			   				<label for="exampleInputPassword1">Password</label>
			   				<input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  			</div>
			  			<button type="submit" class="btn btn-primary">Submit</button>
				  	</form>
				  	<form method="post" action="<?php echo site_url('install/do-uninstall');?>" class="col-md-6">
				  		<h2 class="text-center">un install</h2>
				  		<div class="form-group">
			    			<label for="exampleInputPassword1">Password</label>
			    			<input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  			</div>
			  			<button type="submit" class="btn btn-primary">Submit</button>
				  	</form>
		  		</div>
		  	</div>
		</div>
	</div>
  </body>
</html>  