<?php
require __DIR__ . '/vendor/autoload.php';

use App\Controllers\CommentsController;

$controller = new CommentsController();


require_once('views/main/header.php');

if (!isset($_GET['action'])) {
    echo $controller->getComments();
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            $controller->createComment();
        break;
        case 'read':
            $controller->getComments();
        break;
        case 'update':
            $controller->updateComment();
        break;
        case 'delete':
            $controller->deleteComment();
        break;
        default:
            $controller->getComments();
    }
}

require_once('views/main/footer.php');
