<?php

    require_once '../../functions.php';

    //print_r($_POST); exit;

	if(isset($_POST)){
        $data_source = new DataSource;

		$event = $data_source->cleanInput($_POST['event']);

        if($event == '-1')
        {
            echo json_encode(array('type' => 'error', 'message' => 'Please select an event'));
        }else{
            
            $response = $data_source->getEventCountryList($event);
            if($response != false){
                $list = '';
                for($i = 0; $i < count($response); $i++){
                    $list .= '<option value="'.$response[$i]['country_code'].'">'.$response[$i]['country'].'</option>';
                }
                echo json_encode(array('type' => 'success', 'message' => ''.$list.''));
            }else{
                echo json_encode(array('type' => 'error', 'message' => 'Error Encountered'));
            }            
        }
	}else{
        echo json_encode(array('type' => 'error', 'message' => 'Unauthorized Request. Process Terminated'));
	}

?>