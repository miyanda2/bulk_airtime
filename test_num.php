<?php
include_once './functions.php';
$data_source = new DataSource;




// set API Access Key
$access_key = $data_source->getNVSetting()->nv_accesskey;

// set phone number
$phone_number = '+2348160317744';

// Initialize CURL:
$ch = curl_init('http://apilayer.net/api/validate?access_key='.$access_key.'&number='.$phone_number.'');  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$validationResult = json_decode($json, true);

// Access and use your preferred validation result objects
$validationResult['valid'];
$validationResult['country_code'];
$validationResult['carrier'];


echo $validationResult['country_code'];
?>