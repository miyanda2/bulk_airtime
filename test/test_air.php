<?php
require '../vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

require_once '../functions.php';

$data_source = new DataSource;
$conn = $data_source->getConnection();



// Set your app credentials
$username = 'sandbox'; //$data_source->getAFSetting()->af_username;
$apikey   = 'c7ab1bb74b9337177b35c60cf04cfaa27641987e07246334166a975419c4e196';//$data_source->getAFSetting()->af_apikey;

// Initialize the SDK
$AT       = new AfricasTalking($username, $apikey);

// Get the airtime service
$airtime  = $AT->airtime();

// Set the phone number, currency code and amount in the format below
$recipients = [[
    "phoneNumber"  => "+2348160317744",
    "currencyCode" => "NGN",
    "amount"       => 100
]];

try {
    // That's it, hit send and we'll take care of the rest
    $results = $airtime->send([
        "recipients" => $recipients
        
    ]);

    print_r($results);
} catch(Exception $e) {
    echo "Error: ".$e->getMessage();
}
