<?php

namespace App\Services;

use App\Entities\Annonce;
use App\Entities\User;
use DateTime;

class AnnoncesService
{
    public function setAnnonce(?int $id, string $lieu_depart, string $lieu_arrivee, string $date_depart, string $date_arrivee): string
    {
        $annonceId = '';

        $dataBaseService = new DataBaseService();
        $departDate = new DateTime($date_depart);
        $arriveeDate = new DateTime($date_arrivee);

        if(empty($id)) {
            $annonceId = $dataBaseService->createAnnonce($lieu_depart, $lieu_arrivee, $departDate, $arriveeDate);
        } else {
            $dataBaseService->updateAnnonce($id, $lieu_depart, $lieu_arrivee, $departDate, $arriveeDate);
            $annonceId = $id;
        }

        return $annonceId;
    }

    public function getAnnonces(): array
    {
        $_annonces = array();

        $dataBaseService = new DataBaseService();
        $annoncesDTO = $dataBaseService->getAnnonces();
        if(!empty($annoncesDTO)) {
            foreach($annoncesDTO as $annonceDTO) {
                $annonce = new Annonce();
                $annonce->setId($annonceDTO['id']);
                $annonce->setLieuDepart($annonceDTO['lieu_depart']);
                $annonce->setLieuArrivee($annonceDTO['lieu_arrivee']);

                $dateDepart = new DateTime($annonceDTO['date_depart']);
                $dateArrivee = new DateTime($annonceDTO['date_arrivee']);

                if($dateDepart !== false) {
                    $annonce->setDateDepart($dateDepart);
                }
                if($dateArrivee !== false) {
                    $annonce->setDateArrivee($dateArrivee);
                }

                $_users = $this->getAnnonceUsers($annonceDTO['id']);
                $annonce->setUtilisateurs($_users);

                $_annonces[] = $annonce;
            }
        }

        return $_annonces;
    }
    
    public function deleteAnnonce(string $id): bool
    {
        $result = false;

        $dataBaseService = new DataBaseService();
        $result = $dataBaseService->deleteAnnonce($id);

        return $result;
    }

    public function setAnnonceUsers(string $annonceId, string $userId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setAnnonceUsers($annonceId, $userId);

        return $isOk;
    }

    public function getAnnonceUsers(string $annonceId): array
    {
        $_users = array();

        $dataBaseService = new DataBaseService();
        $usersDTO = $dataBaseService->getAnnonceUsers($annonceId);
        if(!empty($usersDTO)) {
            foreach($usersDTO as $userDTO) {
                $user = new User();
                $user->setId($userDTO['id']);
                $user->setFirstName($userDTO['firstname']);
                $user->setLastName($userDTO['lastname']);
                $user->setEmail($userDTO['email']);

                $date = new DateTime($userDTO['birthday']);
                if($date) {
                    $user->setBirthday($date);
                }

                $_users[] = $user;
            }
            
        }
        return $_users;
    }
}