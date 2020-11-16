<?php

use App\Controllers\AnnoncesController;

require __DIR__ . '/vendor/autoload.php';
$controller = new AnnoncesController();


require_once('views/main/header.php');

if (!isset($_GET['action'])) {
    echo $controller->getAnnonces();
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            echo $controller->createAnnonce();
            require('views/annonce/annonce_create.php');
        break;
        case 'read':
            echo $controller->getAnnonces();
            require('views/annonce/annonce_read.php');
        break;
        case 'update':
            echo $controller->updateAnnonce();
            require('views/annonce/annonce_update.php');
        break;
        case 'delete':
            echo $controller->deleteAnnonce();
            require('views/annonce/annonce_delete.php');
        break;
        default:
            echo $controller->getAnnonces();
            require('views/annonce/annonce_create.php');
    }
}

require_once('views/main/footer.php');