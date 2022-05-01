<?php
// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC38abf5bf054a4c7dce9321f06770dff0';
$token = '0cca59fad60b00044a26682b046c0893';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '+243999537993',
    [
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+19402918123',
        // the body of the text message you'd like to send
        'body' => 'Bonjour libanais shabani vous avez verser un montant de 1000 fc, votre solde est de 9000 fc. akibacompagnie vous remerci pour votre fidelite!'
    ]
);
