<?php
session_start();
    include("../connection.php");
    include("../functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_POST['name'];
         $username = $_POST['username'];
         $email = $_POST['email'];
         $phonenumber = $_POST['phonenumber'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password))
        {
            
            $query = "insert into user(name, username, email, phonenumber, password) value('$name', '$username', '$email', '$phonenumber', '$password')";
            
            mysqli_query($con, $query);

            header("Location: index2.php");
            die;
        }
        else
        {
            echo "";
        }
    };
    


?>
<!DOCTYPE html>
<html lang="en">
    <head>
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>signup</title>
        <link href="css/signup.css" rel="stylesheet" type="text/css">
    </head>
    <body style="background-color:aliceblue;">
    <div id="box">
        <form method="post">
        <div style="font-size: 20px; margin: 10px; color: white">Signup</div>
        <input id="text" type="text" name="name" placeholder="Name" required/><br><br>
            <input id="text" type="text" name="username" placeholder="Username" required/><br><br>
            <input id="text" type="email" name="email" placeholder="email" required/><br><br>
            <input id="text" type="number" name="phonenumber" placeholder="Phone Number" required/><br><br>
        <input id="text" type="password" name="password" placeholder="password" required/><br><br>
        <input id="button" type="submit" value="Signup"><br><br>
            Already have an account?
        <a href="../index.php">Click to Login</a><br><br>
        
        </form>
    </div>
    
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>