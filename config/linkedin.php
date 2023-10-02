<?php

require_once 'vendor/autoload.php';
$config = [
  'callback' => URL . 'login/authLinkedin',
  'keys'     => [
    'id' => '78d4egqflfhtkv',
    'secret' => 'wstZQAhYUkEN0Jw5'
  ],
  'scope'    => 'profile email',
];

$adapter = new Hybridauth\Provider\LinkedIn($config);
