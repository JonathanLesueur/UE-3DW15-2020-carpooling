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

        $usersService = new ReservationsService();
        $users = $usersService->getReservations();

        foreach ($users as $user) {
            $html .=
                '#' . $user->getId() . ' ' .
                $user->getUtilisateur() . ' ' .
                $user->getLieu_arrivee() . ' ' .
                $user->getLieu_depart() . ' ' .
                $user->getDate_depart()->format('d-m-Y') . '<br />';
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
