<?php

namespace App\Services;

use App\Entities\Reservation;
use DateTime;

class ReservationsService
{
    public function setReservation(?int $id, string $utilisateur, string $date_depart, string $lieu_depart, string $lieu_arrivee): bool
    {
        $result = false;
        $dataBaseService = new DataBaseService();
        $departDate = new DateTime($date_depart);

        if(empty($id)) {
            $result = $dataBaseService->createReservation($utilisateur, $departDate, $lieu_depart, $lieu_arrivee);
        } else {
            $result = $dataBaseService->updateReservation($id, $utilisateur, $departDate, $lieu_depart, $lieu_arrivee);
        }
        return $result;
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
                $reservation->setUtilisateur($reservationDTO['utilisateur']);
                $reservation->setLieuDepart($reservationDTO['lieu_depart']);
                $reservation->setLieuArrivee($reservationDTO['lieu_arrivee']);

                $date = new DateTime($reservationDTO['date_depart']);
                if($date !== false) {
                    $reservation->setDateDepart($date);
                }

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
}
