<?php
session_start();
    include("functions.php");
    $db = new DataSource();
$conn = $db->getConnection();


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password) )
        {
        
            $query = "select * from user where email = '$email' limit 1";
            $result = mysqli_query($conn, $query);

            if($result)
            { 
                if($result && mysqli_num_rows($result) > 0)
                {
                    
                $user_data = mysqli_fetch_assoc($result);
                if($user_data ['password'] === $password)
                {
                    $_SESSION['sn'] = $user_data['sn'];
                    header("Location: dash/index.php");
            die;
                }
            }
        }
            
        }
        echo "Wrong email or password";
     } else
        {
            echo "";
        };
    


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bullk Admin - Login</title>
	<link href="dash/css/bootstrap.min.css" rel="stylesheet">
	<link href="dash/css/datepicker3.css" rel="stylesheet">
	<link href="dash/css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>


	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<div class="errMsg"></div>
					<form method="POST" id="frmLogin">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="email" name="email" type="email" required/>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required/>
							</div>
							<div class="checkbox">
								
							</div>
							
							<a href="dash/index2.php"><button type="submit" name= "btn" class="btn btn-primary" id="btnLogin">Login</button></a>
                               Dont have an account?
        <a href="dash/register.php">Click to Signup</a><br><br>
							 </fieldset>
					</form>
				</div>
                </div>
			</div>
		</div><!-- /.col-->
	<!-- /.row -->	
	

<script src="dash/js/jquery-1.11.1.min.js"></script>
	<script src="dash/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
