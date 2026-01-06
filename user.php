<?php

require_once 'bootstrap.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

        // TODO implement get user data
        break;
    case 'POST': // register a new user

        // if data is submitted as form data:
        $email = 'test@abv.bg'; // $_POST['email'];
        $password = '0000';// $_POST['password'];
        $name = 'testuser'; // $_POST['name'];
        $age = 30; // $_POST['age'];

        $user = new User(null, $email, $name, $age);
        $user->setPassword($password);

        $connection = (new Db())->getConnection();
        $insertStatement = $connection->prepare("INSERT INTO users (email, password, name, age) VALUES (:email, :password, :name, :age)");
        $insertStatement->execute([
            'email' => $user->getEmail(),
            'password' => $user->getHashedPassword(),
            'name' => $user->getName(),
            'age' => $user->getAge(),
        ]);

        $userId = $connection->lastInsertId();        

        $_SESSION['user_id'] = $userId;

        echo json_encode(['success' => true, 'email' => $user->getEmail()]);
       
        break;
}