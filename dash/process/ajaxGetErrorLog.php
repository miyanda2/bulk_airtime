<?php

require_once '../../functions.php';

//print_r($_POST); exit;

if (isset($_POST)) {
    $data_source = new DataSource;

    $event = $data_source->cleanInput($_POST['event']);

    if ($event == '-1') {
        echo json_encode(array('type' => 'error', 'message' => 'Please select an event'));
    } else {

        $response = $data_source->getEventErrorLog($event);
        
        if ($response != false) {
            $list = '';
            for ($i = 0; $i < count($response); $i++) {
                $list .= '<tr><td>' . ($i + 1) . '</td><td>' . $response[$i]['phone_number'] . '</td><td>' . $response[$i]['message'] . '</td><td>' . $response[$i]['source'] . '</td></tr>';
            }
            echo json_encode(array('type' => 'success', 'message' => $list));
        } else {
            echo json_encode(array('type' => 'error', 'message' => 'No Record Found'));
        }
    }
} else {
    echo json_encode(array('type' => 'error', 'message' => 'Unauthorized Request. Process Terminated'));
}
