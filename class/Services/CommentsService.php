<?php

namespace App\Services;

use App\Entities\Comment;
use DateTime;

class CommentsService
{
    public function setComment(?int $id, string $titre, string $contenu, int $utilisateur): bool
    {
        $result = false;
        $dataBaseService = new DataBaseService();
        $ecritureDate = new DateTime();

        if (empty($id)) {
            $result = $dataBaseService->createComment($titre, $contenu, $utilisateur, $ecritureDate);
        } else {
            $result = $dataBaseService->updateComment($id, $titre, $contenu, $utilisateur, $ecritureDate);
        }

        return $result;
    }
    public function getComments(): array
    {
        $_comms = array();

        $dataBaseService = new DataBaseService();
        $commentsDTO = $dataBaseService->getComments();
        if (!empty($commentsDTO)) {
            foreach ($commentsDTO as $commentDTO) {
                $comment = new Comment();
                $comment->setId($commentDTO['id']);
                $comment->setTitre($commentDTO['titre']);
                $comment->setContenu($commentDTO['contenu']);
                $comment->setUtilisateur($commentDTO['utilisateur']);
                
                $date = new DateTime($commentDTO['date_ecriture']);
                if ($date !== false) {
                    $comment->setDateEcriture($date);
                }


                $_comms[] = $comment;
            }
        }

        return $_comms;
    }

    public function deleteComment(string $id): bool
    {
        $result = false;

        $dataBaseService = new DataBaseService();
        $result = $dataBaseService->deleteComment($id);

        return $result;
    }
}
