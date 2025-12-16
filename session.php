<?php

session_start();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $isLoggedIn = isset($_SESSION['user_id']);

        echo json_encode(['loggedIn' => $isLoggedIn]);   
        break;

    case 'POST':

        $_SESSION['user_id'] = 1;
       
        break;
    
    case 'DELETE':
        session_destroy();
        break;
}

