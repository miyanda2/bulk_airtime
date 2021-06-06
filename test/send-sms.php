<?php

// require_once __DIR__ . './config.php';
require_once __DIR__ . './../vendor/autoload.php';
require_once './../functions.php';

use AfricasTalking\SDK\AfricasTalking;

$db = new DataSource;
$conn = $db->getConnection();

$basic  = new \Vonage\Client\Credentials\Basic($db->getNXSetting()->nx_apikey, $db->getNXSetting()->nx_apisec);
$client = new \Vonage\Client($basic);

$sms_message =  "Hello &&name You have been send airtime worth &&amount for &&event...";

$sms_message = str_replace('&&name', 'Micheal', $sms_message);
$sms_message = str_replace('&&amount', '100', $sms_message);
$sms_message = str_replace('&&event', 'Event Test', $sms_message);


$response = $client->sms()->send(
    new \Vonage\SMS\Message\SMS("2348160317744", "EventName", $sms_message)
);
//print_r($response);die();

$message = $response->current();

if ($message->getStatus() == 0) {
    echo "The message was sent successfully\n";
} else {
    echo "The message failed with status: " . $message->getStatus() . "\n";
}
