<?php
include './functions.php';
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="dash/css/bootstrap.min.css" rel="stylesheet">
	<link href="dash/css/datepicker3.css" rel="stylesheet">
	<link href="dash/css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<?php

$db->login();
?>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="user" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="pw" type="password" value="">
							</div>
							<div class="checkbox">
								
							</div>
							
							<button type="submit" name= "btn" class="btn btn-primary">Login</button>
							 
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="dash/js/jquery-1.11.1.min.js"></script>
	<script src="dash/js/bootstrap.min.js"></script>
</body>
</html>