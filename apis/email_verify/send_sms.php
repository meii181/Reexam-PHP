<?php

$post = [
    "phone" => "53337377",
    "to_phone" => $to_phone,
    "message" => $sms_message,
    "api_key" => "6b1ebdf5-8e1c-4b50-b05f-910c24ee2bbf"
];

$ch = curl_init("https://fatsms.com/send-sms");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

$answer = curl_exec($ch);

curl_close($ch);

var_dump($answer);