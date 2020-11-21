<?php

namespace App\Controllers;

use App\Services\AnnoncesService;

class AnnoncesController
{
    public function createAnnonce(): void
    {
        $result_create = '';
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
                $result_create = 'Voiture enregistrée avec succès.';
            } else {
                $result_create = 'Erreur lors de l\'enregistrement de la voiture.';
            }
        }

        require('views/annonce/annonce_create.php');

    }

    public function getAnnonces(): void
    {

        $annoncesService = new AnnoncesService();
        $_annonces = $annoncesService->getAnnonces();

        require('views/annonce/annonce_read.php');

    }

    public function updateAnnonce(): void
    {
        $result_update = '';
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
                $result_update = 'Voiture mise à jour avec succès.';
            } else {
                $result_update = 'Erreur lors de la mise à jour de la voiture.';
            }
        }

        require('views/annonce/annonce_update.php');

    }

    public function deleteAnnonce(): void
    {
        $result_delete = '';

        if (isset($_POST['id'])) {
            $annoncesService = new AnnoncesService();
            $isOk = $annoncesService->deleteAnnonce($_POST['id']);
            if ($isOk) {
                $result_delete = 'Annonce supprimée avec succès.';
            } else {
                $result_delete = 'Erreur lors de la supression de l\'annonce.';
            }
        }

        require('views/annonce/annonce_delete.php');

    }
}
