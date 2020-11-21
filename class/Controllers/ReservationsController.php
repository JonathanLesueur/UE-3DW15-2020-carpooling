<?php

namespace App\Controllers;

use App\Services\ReservationsService;
use App\Services\UsersService;

class ReservationsController
{
    public function createReservation(): void
    {
        $result_create = '';
        if (isset($_POST['utilisateur']) &&
           isset($_POST['date_depart']) &&
           isset($_POST['lieu_depart']) &&
           isset($_POST['lieu_arrivee'])) {
               
            $reservationsService = new ReservationsService();
            $reservationId = $reservationsService->setReservation(
                null,
                $_POST['date_depart'],
                $_POST['lieu_depart'],
                $_POST['lieu_arrivee']
            );

            $isOk = true;
            if(!empty($_POST['utilisateur'])) {
                $isOk = $reservationsService->setReservationUsers($reservationId, $_POST['utilisateur']);
            }
            if ($isOk) {
                $result_create = 'Réservation enregistrée avec succès.';
            } else {
                $result_create = 'Erreur lors de l\'enregistrement de la réservation.';
            }
        }

        $usersService = new UsersService();
        $_users = $usersService->getUsers();

        require 'views/reservation/reservation_create.php';
    }

    public function getReservations(): void
    {

        $reservationsService = new ReservationsService();
        $_reservations = $reservationsService->getReservations();

        require 'views/reservation/reservation_read.php';

    }

    public function updateReservation(): void
    {
        $result_update = '';
        if (isset($_POST['id']) &&
            isset($_POST['utilisateur']) &&
            isset($_POST['date_depart']) &&
            isset($_POST['lieu_depart']) &&
            isset($_POST['lieu_arrivee'])) {

            $reservationsService = new ReservationsService();
            $isOk = $reservationsService->setReservation(
                $_POST['id'],
                $_POST['date_depart'],
                $_POST['lieu_depart'],
                $_POST['lieu_arrivee']
            );
            if ($isOk) {
                $result_update = 'Réservation mise à jour avec succès.';
            } else {
                $result_update = 'Erreur lors de la mise à jour de la réservation.';
            }
        }

        $usersService = new UsersService();
        $_users = $usersService->getUsers();
        
        require 'views/reservation/reservation_update.php';
    }

    public function deleteReservation(): void
    {
        $result_delete = '';

        if (isset($_POST['id'])) {
            $reservationsService = new ReservationsService();
            $isOk = $reservationsService->deleteReservation($_POST['id']);
            if ($isOk) {
                $result_delete = 'Réservation supprimée avec succès.';
            } else {
                $result_delete = 'Erreur lors de la supression de la réservation.';
            }
        }
        
        require 'views/reservation/reservation_delete.php';
    }
}
