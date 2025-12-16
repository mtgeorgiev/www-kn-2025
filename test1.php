<?php

require_once 'bootstrap.php';

$number = 5;
$numberString = '10';
$greeting = 'Hello';
$name = 'Student';

// echo $number + $numberString;

$db = new Db();
$connection = $db->getConnection();

$insertStatement = $connection->prepare("INSERT INTO users (name, age) VALUES (:name, :age)");
$insertStatement->execute([
    'name' => 'Камен',
    'age' => 45
]);

echo "Inserted user ID: " . $connection->lastInsertId();  


// echo $greeting . $name;


// echo (new User(1, 'John', 'Doe', null, null))->getFullName();
