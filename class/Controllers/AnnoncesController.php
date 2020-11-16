<?php

namespace App\Controllers;

use App\Services\AnnoncesService;

class AnnoncesController
{
    public function createAnnonce(): string
    {
        $html = '';
        if (isset($_POST['lieu_depart']) &&
            isset($_POST['lieu_arrivee']) &&
            isset($_POST['date_depart']) &&
            isset($_POST['date_arrivee'])) {

            $annoncesService = new AnnoncesService();
            $isOk = $annoncesService->setAnnonce(
                null,
                $_POST['lieu_depart'],
                $_POST['lieu_arrivee'],
                $_POST['date_depart'],
                $_POST['date_arrivee']
            );
            if ($isOk) {
                $html = 'Voiture enregistrée avec succès.';
            } else {
                $html = 'Erreur lors de l\'enregistrement de la voiture.';
            }
        }

        return $html;
    }

    public function getAnnonces(): string
    {
        $html = '';

        $annoncesService = new AnnoncesService();
        $annonces = $annoncesService->getAnnonces();

        foreach ($annonces as $annonce) {
            $html .=
                '#' . $annonce->getId() . ' ' .
                $annonce->getLieuDepart() . ' ' .
                $annonce->getDateDepart()->format('d-m-Y') . ' ' .
                $annonce->getLieuArrivee() . ' ' .
                $annonce->getDateArrivee()->format('d-m-Y') . '<br />';
        }

        return $html;
    }

    public function updateAnnonce(): string
    {
        $html = '';
        if (isset($_POST['id']) &&
            isset($_POST['lieu_depart']) &&
            isset($_POST['lieu_arrivee']) &&
            isset($_POST['date_depart']) &&
            isset($_POST['date_arrivee'])) {

            $annoncesService = new AnnoncesService();
            $isOk = $annoncesService->setAnnonce(
                $_POST['id'],
                $_POST['lieu_depart'],
                $_POST['lieu_arrivee'],
                $_POST['date_depart'],
                $_POST['date_arrivee']
            );
            if ($isOk) {
                $html = 'Voiture mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la voiture.';
            }
        }

        return $html;
    }

    public function deleteAnnonce(): string
    {
        $html = '';

        if (isset($_POST['id'])) {
            $annoncesService = new AnnoncesService();
            $isOk = $annoncesService->deleteAnnonce($_POST['id']);
            if ($isOk) {
                $html = 'Annonce supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'annonce.';
            }
        }

        return $html;
    }
}
