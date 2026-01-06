<?php

require_once 'bootstrap.php';

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $isLoggedIn = Session::isUserLoggedIn();

        echo json_encode(['loggedIn' => $isLoggedIn]);   
        break;

    case 'POST':

        // if data is submitted as form data:
        $email = $_POST['email'];
        $password = $_POST['password'];

        // if data is submitted as JSON:
        // $inputData = json_decode(file_get_contents('php://input'), true);

        // $email = $inputData['email'] ?? '';
        // $password = $inputData['password'] ?? '';

        // validate user input (TODO)

        // check if the user credentials are correct (TODO) - check in db

        $connection = (new Db())->getConnection();
        $selectStatement = $connection->prepare("SELECT * FROM users WHERE email = :email");
        $selectStatement->execute(['email' => $email]);
        $userData = $selectStatement->fetch();

        $successfulLogin = $userData && password_verify($password, $userData['password']);
        
        if ($successfulLogin) {
            Session::logUser(User::fromArray($userData));
        }

        echo json_encode(['success' => $successfulLogin]);
       
        break;
    
    case 'DELETE':
        session_destroy();
        echo json_encode(['success' => true]);
        break;
}

