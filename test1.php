<?php

require_once 'bootstrap.php';

$number = 5;
$numberString = '10';
$greeting = 'Hello';
$name = 'Student';

// echo $number + $numberString;


echo $greeting . $name;


echo (new User(1, 'John', 'Doe', null, null))->getFullName();
