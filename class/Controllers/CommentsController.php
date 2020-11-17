<?php

namespace App\Controllers;

use App\Services\CommentsService;

class CommentsController
{
    public function createComment(): string
    {
        $html = '';
        if (isset($_POST['titre']) &&
            isset($_POST['contenu']) &&
            isset($_POST['utilisateur']) &&
            isset($_POST['date_ecriture'])) {
            $commentsService = new CommentsService();
            $isOk = $commentsService->setComment(
                null,
                $_POST['titre'],
                $_POST['contenu'],
                $_POST['utilisateur'],
                $_POST['date_ecriture']
            );
            if ($isOk) {
                $html = 'Commentaire enregistré avec succès.';
            } else {
                $html = 'Erreur lors de l\'enregistrement du commentaire.';
            }
        }
        return $html;
    }
    public function getComments(): string
    {
        $html = '';

        $commentsService = new CommentsService();
        $comments = $commentsService->getComments();

        foreach ($comments as $comment) {
            $html .=
                '#' . $comment->getId() . ' ' .
                $comment->getTitre() . ' ' .
                $comment->getContenu() . ' ' .
                $comment->getUtilisateur() . ' ' .
                $comment->getDateEcriture()->format('d-m-Y') . '<br />';
        }

        return $html;
    }
    public function updateComment(): string
    {
        $html = '';
        if (isset($_POST['id']) &&
           isset($_POST['titre']) &&
           isset($_POST['contenu']) &&
           isset($_POST['utilisateur']) &&
           isset($_POST['date_ecriture'])) {
            $commentsService = new CommentsService();
            $isOk = $commentsService->setComment(
                $_POST['id'],
                $_POST['titre'],
                $_POST['contenu'],
                $_POST['utilisateur'],
                $_POST['date_ecriture']
            );
            if ($isOk) {
                $html = 'Commentaire mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour du commentaire.';
            }
        }

        return $html;
    }
    public function deleteComment(): string
    {
        $html = '';

        if (isset($_POST['id'])) {
            $commentsService = new CommentsService();
            $isOk = $commentsService->deleteComment($_POST['id']);
            if ($isOk) {
                $html = 'Commentaire supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression du commentaire.';
            }
        }

        return $html;
    }
}
