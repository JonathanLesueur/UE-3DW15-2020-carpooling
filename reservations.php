<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';
$controller = new ReservationsController();


require_once('views/main/header.php');

if (!isset($_GET['action'])) {
    echo $controller->getReservations();
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            echo $controller->createReservation();
            require('views/reservation/reservation_create.php');
        break;
        case 'read':
            echo $controller->getReservations();
            require('views/reservation/reservation_read.php');
        break;
        case 'update':
            echo $controller->updateReservation();
            require('views/reservation/reservation_update.php');
        break;
        case 'delete':
            echo $controller->deleteReservation();
            require('views/reservation/reservation_delete.php');
        break;
        default:
            echo $controller->getReservations();
            require('views/reservation/reservation_create.php');
    }
}

require_once('views/main/footer.php');
