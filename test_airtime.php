<?php
/* 
curl -X POST \
    https://api.sandbox.africastalking.com/version1/airtime/send \
    -H 'Accept: application/json' \
    -H 'Content-Type: application/x-www-form-urlencoded' \
    -H 'apiKey: MyAppAPIKey' \
    -d 'username=myAppUserName&recipients=%5B%7B%22phoneNumber%22%3A%20%22MyPhoneNumber%22%2C%22currencyCode%22%3A%20%22KES%22%2C%20%22amount%22%3A%20%22100%22%20%7D%5D'
*/

// echo urldecode('username=myAppUserName&recipients=%5B%7B%22phoneNumber%22%3A%20%22MyPhoneNumber%22%2C%22currencyCode%22%3A%20%22KES%22%2C%20%22amount%22%3A%20%22100%22%20%7D%5D');
// die();
$headers = array(
    'Content-Type: application/x-www-form-urlencoded',
    'Accept: application/json',
    'apiKey: key'
    );


$data = array(
    "username" => "sandbox",
    'recipients'=> '[{"phoneNumber":"+2348160317744","amount":"NGN 100.00"}]'
    );



$encoded = urlencode('username=sandbox&recipients=[{"phoneNumber":"+2348160317744","amount":"NGN 100.00"}]');
// Initialize CURL:
$ch = curl_init('https://api.sandbox.africastalking.com/version1/airtime/send');  
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_POSTFIELDS,  $data);


// Store the data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$validationResult = json_decode($json, true);
print_r($json);
