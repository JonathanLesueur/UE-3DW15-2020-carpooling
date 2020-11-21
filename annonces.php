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
            $controller->createAnnonce();
        break;
        case 'read':
            $controller->getAnnonces();
        break;
        case 'update':
            $controller->updateAnnonce();
        break;
        case 'delete':
            $controller->deleteAnnonce();
        break;
        default:
            $controller->getAnnonces();
    }
}

require_once('views/main/footer.php');