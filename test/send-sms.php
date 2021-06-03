<?php

// require_once __DIR__ . './config.php';
require_once __DIR__ . './vendor/autoload.php';
require_once './functions.php';

$data_source = new DataSource;
$conn = $data_source->getConnection();

$basic  = new \Vonage\Client\Credentials\Basic($data_source->getNXSetting()->nx_pubkey, $data_source->getNXSetting()->nx_seckey);
$client = new \Vonage\Client($basic);

$response = $client->sms()->send(
    new \Vonage\SMS\Message\SMS("2348160317744", "EventName", 'Dear $User, airtine value of $amount $currency_code, bla bla')
);

$message = $response->current();

if ($message->getStatus() == 0) {
    echo "The message was sent successfully\n";
} else {
    echo "The message failed with status: " . $message->getStatus() . "\n";
}
