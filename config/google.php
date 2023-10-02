<?php

require_once 'vendor/autoload.php';
$client = new Google\Client();
$client->setAuthConfig("config/client_google.json");
$client->addScope("email");
$client->addScope("profile");
