<?php

namespace App\Services;

use App\Entities\Comment;
use App\Entities\User;
use App\Entities\Annonce;

use App\Services\AnnoncesService;

use DateTime;

class CommentsService
{
    public function setComment(?int $id, string $titre, string $contenu): string
    {
        $commentId = '';
        $dataBaseService = new DataBaseService();
        $ecritureDate = new DateTime();

        if (empty($id)) {
            $commentId = $dataBaseService->createComment($titre, $contenu, $ecritureDate);
        } else {
            $dataBaseService->updateComment($id, $titre, $contenu, $ecritureDate);
            $commentId = $id;
        }

        return $commentId;
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
                
                $date = new DateTime($commentDTO['date_ecriture']);
                if ($date !== false) {
                    $comment->setDateEcriture($date);
                }

                $_users = $this->getCommentUser($commentDTO['id']);
                $comment->setUtilisateur($_users);

                $_annonces = $this->getCommentAnnonce($commentDTO['id']);
                $comment->setAnnonce($_annonces);


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

    public function setCommentAnnonce(string $commentId, string $annonceId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setCommentAnnonce($commentId, $annonceId);

        return $isOk;
    }

    public function getCommentAnnonce(string $commentId): array
    {
        $_commentAnnonces = array();
        
        $dataBaseService = new DataBaseService();
        $commentAnnoncesDTO = $dataBaseService->getCommentAnnonce($commentId);

        if (!empty($commentAnnoncesDTO)) {
            foreach ($commentAnnoncesDTO as $commentAnnonceDTO) {
                $annonce = new Annonce();
                $annonce->setId($commentAnnonceDTO['id']);
                $annonce->setLieuDepart($commentAnnonceDTO['lieu_depart']);
                $annonce->setLieuArrivee($commentAnnonceDTO['lieu_arrivee']);

                $dateDepart = new DateTime($commentAnnonceDTO['date_depart']);
                if ($dateDepart) {
                    $annonce->setDateDepart($dateDepart);
                }
                
                $dateArrivee = new DateTime($commentAnnonceDTO['date_arrivee']);
                if ($dateArrivee) {
                    $annonce->setDateArrivee($dateArrivee);
                }

                $annoncesService = new AnnoncesService();
                $_users = $annoncesService->getAnnonceUsers($commentAnnonceDTO['id']);
                $annonce->setUtilisateurs($_users);

                $_commentAnnonces[] = $annonce;
            }
        }

        return $_commentAnnonces;
    }
    
    public function setCommentUser(string $commentId, string $userId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setCommentUser($commentId, $userId);

        return $isOk;
    }

    public function getCommentUser(string $commentId): array
    {
        $_commentUsers = array();
        
        $dataBaseService = new DataBaseService();
        $commentUsersDTO = $dataBaseService->getCommentUser($commentId);

        if (!empty($commentUsersDTO)) {
            foreach ($commentUsersDTO as $commentUserDTO) {
                $user = new User();
                $user->setId($commentUserDTO['id']);
                $user->setFirstName($commentUserDTO['firstname']);
                $user->setLastName($commentUserDTO['lastname']);
                $user->setEmail($commentUserDTO['email']);
                
                $birthday = new Datetime($commentUserDTO['birthday']);
                if ($birthday) {
                    $user->setBirthday($birthday);
                }

                $_commentUsers[] = $user;
            }
        }

        return $_commentUsers;
    }
}
