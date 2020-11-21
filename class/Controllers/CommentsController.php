<?php

namespace App\Controllers;

use App\Services\CommentsService;

class CommentsController
{
    public function createComment(): void
    {
        $result_create = '';
        if (isset($_POST['titre']) &&
            isset($_POST['contenu']) &&
            isset($_POST['utilisateur'])) {
            $commentsService = new CommentsService();
            $isOk = $commentsService->setComment(
                null,
                $_POST['titre'],
                $_POST['contenu'],
                $_POST['utilisateur']
            );
            if ($isOk) {
                $result_create = 'Commentaire enregistré avec succès.';
            } else {
                $result_create = 'Erreur lors de l\'enregistrement du commentaire.';
            }
        }
        require 'views/comment/comment_create.php';
    }
    public function getComments(): void
    {
        
        $commentsService = new CommentsService();
        $_comments = $commentsService->getComments();

    
        require 'views/comment/comment_read.php';
    }
    public function updateComment(): void
    {
        $result_update = '';
        if (isset($_POST['id']) &&
           isset($_POST['titre']) &&
           isset($_POST['contenu']) &&
           isset($_POST['utilisateur'])) {
            $commentsService = new CommentsService();
            $isOk = $commentsService->setComment(
                $_POST['id'],
                $_POST['titre'],
                $_POST['contenu'],
                $_POST['utilisateur']
            );
            if ($isOk) {
                $result_update = 'Commentaire mis à jour avec succès.';
            } else {
                $result_update = 'Erreur lors de la mise à jour du commentaire.';
            }
        }

        require 'views/comment/comment_update.php';
    }
    public function deleteComment(): void
    {
        $result_delete = '';

        if (isset($_POST['id'])) {
            $commentsService = new CommentsService();
            $isOk = $commentsService->deleteComment($_POST['id']);
            if ($isOk) {
                $result_delete = 'Commentaire supprimé avec succès.';
            } else {
                $result_delete = 'Erreur lors de la supression du commentaire.';
            }
        }

        require 'views/comment/comment_delete.php';
    }
}
