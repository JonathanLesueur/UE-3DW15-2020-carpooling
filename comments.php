<?php

use App\Controllers\CommentsController;

require __DIR__ . '/vendor/autoload.php';
$controller = new CommentsController();


require_once('views/main/header.php');

if (!isset($_GET['action'])) {
    echo $controller->getComments();
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'create':
            echo $controller->createComment();
            require('views/comment/comment_create.php');
        break;
        case 'read':
            echo $controller->getComments();
            require('views/comment/comment_read.php');
        break;
        case 'update':
            echo $controller->updateComment();
            require('views/comment/comment_update.php');
        break;
        case 'delete':
            echo $controller->deleteComment();
            require('views/comment/comment_delete.php');
        break;
        default:
            echo $controller->getComments();
            require('views/comment/comment_create.php');
    }
}

require_once('views/main/footer.php');