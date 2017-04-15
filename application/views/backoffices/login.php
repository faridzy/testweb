<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../dist/admin/styles/style.css">
	<link rel="stylesheet" href="../dist/admin/styles/bootstrap.min.css">
</head>
<body class="body_login">
	<div class="col-md-4 col-md-offset-4 form-login">

		<div class="outor-form-login">
			<form class="in-login" method="post">
				<h3 class="text-center">Login </h3>
				<?php echo $message; ?>
				<div class="form-group">
					<input type="text" name="username" placeholder="User Name" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="Password" class="form-control" required>
				</div>
				<button class="btn btn-block btn-custom-green" type="submit" name="submit" value="true">Login</button>
			</form>
		</div>
	</div>
</body>
</html>