<?php

// require_once __DIR__ . './config.php';
require_once __DIR__ . './vendor/autoload.php';

$basic  = new \Vonage\Client\Credentials\Basic("3d78adaf", "NfF9SOzqxGvPgdjv");
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
