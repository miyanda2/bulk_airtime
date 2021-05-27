<?php

    require_once '../functions.php';
$data_source = new DataSource;
$conn = $data_source->getConnection();
    //print_r($_POST); exit;

	if(isset($_POST)){
        $events = $data_source->cleanInput($_POST['events']);
        

        if( strlen($events) < 3 )
        {
            $err = 'Please fill in all fields';
        }else{
            $response = $data_source->addNewEvent($events);
            //echo $response; exit;
            if($response){
                $err = '1';
            }else{
                $err = 'Request not Completed. Try again. ';
            }            
        }
        echo $err;
	}else{
        echo 'Unauthorized Request. Process Terminated';
	}

?>
