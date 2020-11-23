<?php

namespace App\Services;

use App\Entities\Reservation;
use App\Entities\User;
use App\Entities\Annonce;

use DateTime;

class ReservationsService
{
    public function setReservation(?int $id, string $date_depart, string $lieu_depart, string $lieu_arrivee): string
    {
        $reservationId = '';
        $dataBaseService = new DataBaseService();
        $departDate = new DateTime($date_depart);

        if(empty($id)) {
            $reservationId = $dataBaseService->createReservation($departDate, $lieu_depart, $lieu_arrivee);
        } else {
            $dataBaseService->updateReservation($id, $departDate, $lieu_depart, $lieu_arrivee);
            $reservationId = $id;
        }
        return $reservationId;
    }

    public function getReservations(): array
    {
        $_reservations = array();

        $dataBaseService = new DataBaseService();
        $reservationsDTO = $dataBaseService->getReservations();
        if(!empty($reservationsDTO)) {
            foreach($reservationsDTO as $reservationDTO) {
                $reservation = new Reservation();
                $reservation->setId($reservationDTO['id']);
                $reservation->setLieuDepart($reservationDTO['lieu_depart']);
                $reservation->setLieuArrivee($reservationDTO['lieu_arrivee']);

                $date = new DateTime($reservationDTO['date_depart']);
                if($date !== false) {
                    $reservation->setDateDepart($date);
                }

                $_users = $this->getReservationUsers($reservationDTO['id']);
                $reservation->setUtilisateurs($_users);

                $_reservations[] = $reservation;
            }
        }
        return $_reservations;
    }

    public function deleteReservation(string $id): bool
    {
        $result = false;
        $dataBaseService = new DataBaseService();
        $result = $dataBaseService->deleteReservation($id);

        return $result;
    }

    public function setReservationUsers(string $reservationId, string $userId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setReservationUsers($reservationId, $userId);

        return $isOk;
    }

    public function getReservationUsers(string $reservationId): array
    {
        $_users = array();

        $dataBaseService = new DataBaseService();
        $usersDTO = $dataBaseService->getReservationUsers($reservationId);
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

    public function setReservationAnnonces(string $reservationId, string $annonceId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setReservationAnnonces($reservationId, $annonceId);

        return $isOk;
    }

    public function getReservationAnnonces(string $reservationId): array
    {
        $_annonces = array();

        $dataBaseService = new DataBaseService();
        $annoncesDTO = $dataBaseService->getReservationAnnonces($reservationId);
        if(!empty($annoncesDTO)) {
            foreach($annoncesDTO as $annoncesDTO) {
                $annonce = new Annonce();
                $annonce->setId($annoncesDTO['id']);
                $annonce->setLieuDepart($annoncesDTO['lieu_depart']);
                $annonce->setLieuArrivee($annoncesDTO['lieu_arrivee']);

                $dateDepart = new DateTime($annoncesDTO['date_depart']);
                if($dateDepart) {
                    $annonce->setDateDepart($dateDepart);
                }

                $dateArrivee = new DateTime($annoncesDTO['date_arrivee']);
                if($dateArrivee) {
                    $annonce->setDateDepart($dateArrivee);
                }

                $_annonces[] = $annonce;
            }
            
        }
        return $_annonces;
    }
}
