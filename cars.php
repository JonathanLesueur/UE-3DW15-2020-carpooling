<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';
$controller = new CarsController();


require_once('views/main/header.php');

if (!isset($_GET['action'])) {
    echo $controller->getCars();
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            $controller->createCar();
        break;
        case 'read':
            $controller->getCars();
        break;
        case 'update':
            $controller->updateCar();
        break;
        case 'delete':
            $controller->deleteCar();
        break;
        default:
            $controller->getCars();
    }
}

require_once('views/main/footer.php');