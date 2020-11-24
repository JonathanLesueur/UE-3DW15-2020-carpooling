<?php
require __DIR__ . '/vendor/autoload.php';

use App\Controllers\UsersController;

$controller = new UsersController();


require_once('views/main/header.php');

if (!isset($_GET['action'])) {
    echo $controller->getUsers();
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            $controller->createUser();
        break;
        case 'read':
            $controller->getUsers();
        break;
        case 'update':
            $controller->updateUser();
        break;
        case 'delete':
            $controller->deleteUser();
        break;
        default:
            $controller->getUsers();
    }
}

require_once('views/main/footer.php');
