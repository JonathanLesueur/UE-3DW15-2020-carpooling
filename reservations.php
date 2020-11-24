<?php
require __DIR__ . '/vendor/autoload.php';

use App\Controllers\ReservationsController;

$controller = new ReservationsController();


require_once('views/main/header.php');

if (!isset($_GET['action'])) {
    echo $controller->getReservations();
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            $controller->createReservation();
        break;
        case 'read':
            $controller->getReservations();
        break;
        case 'update':
            $controller->updateReservation();
        break;
        case 'delete':
            $controller->deleteReservation();
        break;
        default:
            $controller->getReservations();
    }
}

require_once('views/main/footer.php');
