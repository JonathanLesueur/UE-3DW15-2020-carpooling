<?php

namespace App\Controllers;

use App\Services\ReservationsService;

class ReservationsController
{
    public function createReservation(): string
    {
        $html = '';
        if (isset($_POST['utilisateur']) &&
           isset($_POST['date_depart']) &&
           isset($_POST['lieu_depart']) &&
           isset($_POST['lieu_arrivee'])) {
               
            $reservationsService = new ReservationsService();
            $isOk = $reservationsService->setReservation(
                null,
                $_POST['utilisateur'],
                $_POST['date_depart'],
                $_POST['lieu_depart'],
                $_POST['lieu_arrivee']
            );
            if ($isOk) {
                $html = 'Réservation enregistrée avec succès.';
            } else {
                $html = 'Erreur lors de l\'enregistrement de la réservation.';
            }
        }

        return $html;
    }

    public function getReservations(): string
    {
        $html = '';

        $reservationsService = new ReservationsService();
        $reservations = $reservationsService->getReservations();

        foreach ($reservations as $reservation) {
            $html .=
                '#' . $reservation->getId() . ' ' .
                $reservation->getUtilisateur() . ' ' .
                $reservation->getLieu_arrivee() . ' ' .
                $reservation->getLieu_depart() . ' ' .
                $reservation->getDate_depart()->format('d-m-Y') . '<br />';
        }

        return $html;
    }

    public function updateReservation(): string
    {
        $html = '';
        if (isset($_POST['id']) &&
            isset($_POST['utilisateur']) &&
            isset($_POST['date_depart']) &&
            isset($_POST['lieu_depart']) &&
            isset($_POST['lieu_arrivee'])) {

            $reservationsService = new ReservationsService();
            $isOk = $reservationsService->setReservation(
                $_POST['id'],
                $_POST['utilisateur'],
                $_POST['date_depart'],
                $_POST['lieu_depart'],
                $_POST['lieu_arrivee']
            );
            if ($isOk) {
                $html = 'Réservation mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la réservation.';
            }
        }

        return $html;
    }

    public function deleteReservation(): string
    {
        $html = '';

        if (isset($_POST['id'])) {
            $reservationsService = new ReservationsService();
            $isOk = $reservationsService->deleteReservation($_POST['id']);
            if ($isOk) {
                $html = 'Réservation supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la réservation.';
            }
        }

        return $html;
    }
}
