<?php

namespace App\Services;

use App\Entities\Annonce;
use App\Entities\User;
use App\Entities\Comment;
use App\Entities\Car;
use App\Entities\Reservation;

use App\Services\ReservationsService;
use App\Services\CommentsService;

use DateTime;

class AnnoncesService
{
    public function setAnnonce(?int $id, string $lieu_depart, string $lieu_arrivee, string $date_depart, string $date_arrivee): string
    {
        $annonceId = '';

        $dataBaseService = new DataBaseService();
        $departDate = new DateTime($date_depart);
        $arriveeDate = new DateTime($date_arrivee);

        if (empty($id)) {
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
        if (!empty($annoncesDTO)) {
            foreach ($annoncesDTO as $annonceDTO) {
                $annonce = new Annonce();
                $annonce->setId($annonceDTO['id']);
                $annonce->setLieuDepart($annonceDTO['lieu_depart']);
                $annonce->setLieuArrivee($annonceDTO['lieu_arrivee']);

                $dateDepart = new DateTime($annonceDTO['date_depart']);
                if ($dateDepart) {
                    $annonce->setDateDepart($dateDepart);
                }

                $dateArrivee = new DateTime($annonceDTO['date_arrivee']);
                if ($dateArrivee) {
                    $annonce->setDateArrivee($dateArrivee);
                }

                $_users = $this->getAnnonceUsers($annonceDTO['id']);
                $annonce->setUtilisateurs($_users);

                $_comments = $this->getAnnonceComments($annonceDTO['id']);
                $annonce->setCommentaires($_comments);

                $_cars = $this->getAnnonceCars($annonceDTO['id']);
                $annonce->setVoitures($_cars);

                $_reservations = $this->getAnnonceReservations($annonceDTO['id']);
                $annonce->setReservations($_reservations);

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
        if (!empty($usersDTO)) {
            foreach ($usersDTO as $userDTO) {
                $user = new User();
                $user->setId($userDTO['id']);
                $user->setFirstName($userDTO['firstname']);
                $user->setLastName($userDTO['lastname']);
                $user->setEmail($userDTO['email']);

                $date = new DateTime($userDTO['birthday']);
                if ($date) {
                    $user->setBirthday($date);
                }

                $_users[] = $user;
            }
        }
        return $_users;
    }

    public function getAnnonceComments(string $annonceId): array
    {
        $_comments = array();

        $dataBaseService = new DataBaseService();
        $commentsDTO = $dataBaseService->getAnnonceComments($annonceId);
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
                $commentsService = new CommentsService();

                $_users = $commentsService->getCommentUser($commentDTO['id']);
                $comment->setUtilisateur($_users);

                $_annonces = $commentsService->getCommentAnnonce($commentDTO['id']);
                $comment->setAnnonce($_annonces);

                $_comments[] = $comment;
            }
        }
        return $_comments;
    }

    public function setAnnonceCars(string $annonceId, string $carId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setAnnonceCars($annonceId, $carId);

        return $isOk;
    }

    public function getAnnonceCars(string $annonceId): array
    {
        $_cars = array();

        $dataBaseService = new DataBaseService();
        $carsDTO = $dataBaseService->getAnnonceCars($annonceId);
        if (!empty($carsDTO)) {
            foreach ($carsDTO as $carDTO) {
                $car = new Car();
                $car->setId($carDTO['id']);
                $car->setModele($carDTO['modele']);
                $car->setCouleur($carDTO['couleur']);
                $car->setMarque($carDTO['marque']);
                $car->setPuissanceMoteur($carDTO['puissance_moteur']);

                $date = new DateTime($carDTO['mise_circulation']);
                if ($date) {
                    $car->setCirculation($date);
                }

                $_cars[] = $car;
            }
        }
        return $_cars;
    }

    public function getAnnonceReservations(string $annonceId): array
    {
        $_reservations = array();

        $dataBaseService = new DataBaseService();
        $reservationsDTO = $dataBaseService->getAnnonceReservations($annonceId);
        if (!empty($reservationsDTO)) {
            foreach ($reservationsDTO as $reservationDTO) {
                $reservation = new Reservation();

                $reservation->setId($reservationDTO['id']);
                $reservation->setLieuDepart($reservationDTO['lieu_depart']);
                $reservation->setLieuArrivee($reservationDTO['lieu_arrivee']);

                $dateDepart = new DateTime($reservationDTO['date_depart']);
                if($dateDepart) {
                    $reservation->setDateDepart($dateDepart);
                }

                $reservationsService = new ReservationsService();
                $_users = $reservationsService->getReservationUsers($reservationDTO['id']);
                $reservation->setUtilisateurs($_users);

                $_reservations[] = $reservation;
            }
        }
        return $_reservations;
    }
}
