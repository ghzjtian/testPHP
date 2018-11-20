<?php

require '../../vendor/autoload.php'; // include Composer's autoloader


$db = (new MongoDB\Client)->test;

//$result = $db->createCollection('users', [
//    'validator' => [
//        'username' => ['$type' => 'string'],
//        'email' => ['$regex' => '@mongodb\.com$'],
//    ],
//]);

$db->users->insert(array("username" => "Tian", "email" => "tian@glb.com"));

var_dump($db);

//var_dump($result);

?>