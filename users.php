<?php

use App\Controllers\UsersController;

require __DIR__ . '/vendor/autoload.php';
$controller = new UsersController();


require_once('views/main/header.php');

if (!isset($_GET['action'])) {
    echo $controller->getUsers();
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            echo $controller->createUser();
            require('views/user/user_create.php');
        break;
        case 'read':
            echo $controller->getUsers();
            require('views/user/user_read.php');
        break;
        case 'update':
            echo $controller->updateUser();
            require('views/user/user_update.php');
        break;
        case 'delete':
            echo $controller->deleteUser();
            require('views/user/user_delete.php');
        break;
        default:
            echo $controller->getUsers();
            require('views/user/user_read.php');
    }
}

require_once('views/main/footer.php');
