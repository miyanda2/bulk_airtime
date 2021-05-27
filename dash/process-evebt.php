<?php

    require_once '../functions.php';
$db = new DataSource();
$conn = $db->getConnection();
    //print_r($_POST); exit;

	if(isset($_POST)){
        $events =
        ($_POST['events']);
        
        if( strlen($events) < 3)
        {
            $err = 'Please fill in all fields';
        }else{
            $response = $db->addNewEvent($events);
            //echo $response; exit;
            if($response){
                $err = '1';
            }else{
                $err = 'Event Added Sucessfully. ';
            }            
        }
        echo $err;
	}else{
        echo 'Unauthorized Request. Process Terminated';
	}
