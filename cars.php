<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';
$controller = new CarsController();


require_once('views/main/header.php');

if(!isset($_GET['action'])) {
    echo $controller->getCars();
}

if(isset($_GET['action'])) {
    switch($_GET['action']) {
        case 'create':
            echo $controller->createCar();
            require('views/car/car_create.php');
        break;
        case 'read':
            echo $controller->getCars();
            require('views/car/car_read.php');
        break;
        case 'update':
            echo $controller->updateCar();
            require('views/car/car_update.php');
        break;
        case 'delete':
            echo $controller->deleteCar();
            require('views/car/car_delete.php');
        break;
        default;
            echo $controller->getCars();
            require('views/car/car_create.php');
    }
}

require_once('views/main/footer.php');