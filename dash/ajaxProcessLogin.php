<?php

    require_once './functions.php';

    //print_r($_POST); exit;

	if(isset($_POST)){
        $data_source = new DataSource;

		$user = $data_source->cleanInput($_POST['user']);
        $password = $data_source->cleanInput($_POST['pw']);

        if( strlen($user) < 3 || strlen($password) < 5)
        {
            $err = 'Please fill in all fields';
        }else{
            
            $response = $data_source->isLoginValid($user, $password);
            if($response){
                $err = 'success';
            }else{
                $err = 'Invalid Username / Password ';
            }            
        }
        echo $err;
	}else{
        echo 'Unauthorized Request. Process Terminated';
	}

?>