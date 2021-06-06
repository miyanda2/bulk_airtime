<?php

    require_once './functions.php';

    //print_r($_POST); exit;

	if(isset($_POST)){
        $db = new DataSource();

		$username = $db->cleanInput($_POST['user']);
        $password = $db->cleanInput($_POST['pw']);

        if( strlen($username) < 3 || strlen($password) < 5)
        {
            $err = 'Please fill in all fields';
        }else{
            $response = $db->isLoginValid($username, $password);
            if($response == 'success'){
                $sessionHandler->createSession('isLoggedIn', 'Yes');
                $sessionHandler->createSession('adusername', $username);

                $err = '1';
            }else{
                $err = 'Invalid Username / Password ';
            }            
        }
        echo $err;
	}else{
        echo 'Unauthorized Request. Process Terminated';
	}

?>