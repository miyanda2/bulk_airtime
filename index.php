<?php
    include './functions.php';
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

<?php


?>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<div class="errMsg"></div>
					<form method="POST" id="frmLogin">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="user" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="pw" type="password" value="">
							</div>
							<div class="checkbox">
								
							</div>
							
							<button type="button" name= "btn" class="btn btn-primary" id="btnLogin">Login</button>
							 
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="dash/js/jquery-1.11.1.min.js"></script>
	<script src="dash/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>

        function formatErrorMessage(jqXHR, exception) 
        {
            if (jqXHR.status === 0) {
                return ('Not connected.\nPlease verify your network connection.');
            } else if (jqXHR.status == 404) {
                return ('The requested page not found. [404]');
            } else if (jqXHR.status == 500) {
                return ('Internal Server Error [500].');
            } else if (exception === 'parsererror') {
                return ('Requested JSON parse failed.');
            } else if (exception === 'timeout') {
                return ('Time out error.');
            } else if (exception === 'abort') {
                return ('Ajax request aborted.');
            } else {
                return ('Uncaught Error.\n' + jqXHR.responseText);
            }
        }


        $(document).on('click', '#btnLogin', function(e){
            e.preventDefault();
            var formData = $('#frmLogin').serialize();
            var displayMessage = $('.errMsg');

            swal("Please wait...");
            displayMessage.html('<div class="alert alert-info mt-3 text-center" role="alert"> Please wait... </div>');

            $.ajax({
                async: true,
                url: 'ajaxProcessLogin.php',
                type: 'POST',
                data: formData,
                success: function (msg) {
                    if(msg == 'success'){
                        $('#frmLogin')[0].reset();
                        swal("Good job!", "Login Successful.", "success");
                        displayMessage.html('<div class="alert alert-success text-center" role="alert"> Login Successful. </div>');
                        setTimeout((function(){ location.href = 'dash' }), 3000);
                    }else{
                        displayMessage.html('<div class="alert alert-danger text-center" role="alert"> '+msg+' </div>');
                        swal("Oops!", ""+msg+"", "error");
                    }
                },
                error: function(x,e) {            
                    displayMessage.html('<div class="alert alert-danger text-center" role="alert"> '+formatErrorMessage(x, e)+' </div>');
                    swal("Oops!", ""+formatErrorMessage(x, e)+"", "error");
                }
            })
        });
    </script>
</body>
</html>
