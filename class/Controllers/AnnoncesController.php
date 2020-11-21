<?php

namespace App\Controllers;

use App\Services\AnnoncesService;
use App\Services\UsersService;

class AnnoncesController
{
    public function createAnnonce(): void
    {
        $result_create = '';
        if (isset($_POST['lieu_depart']) &&
            isset($_POST['lieu_arrivee']) &&
            isset($_POST['date_depart']) &&
            isset($_POST['date_arrivee']) &&
            isset($_POST['utilisateur'])) {

            $annoncesService = new AnnoncesService();
            $annonceId = $annoncesService->setAnnonce(
                null,
                $_POST['lieu_depart'],
                $_POST['lieu_arrivee'],
                $_POST['date_depart'],
                $_POST['date_arrivee'],
                $_POST['utilisateur']
            );

            $isOk = true;
            if(!empty($_POST['utilisateur'])) {
                $isOk = $annoncesService->setAnnonceUsers($annonceId, $_POST['utilisateur']);
            }
            if ($isOk) {
                $result_create = 'Annonce enregistrée avec succès.';
            } else {
                $result_create = 'Erreur lors de l\'enregistrement de l\'annonce.';
            }
        }

        $usersService = new UsersService();
        $_users = $usersService->getUsers();

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
            isset($_POST['date_arrivee']) &&
            isset($_POST['utilisateur'])) {

            $annoncesService = new AnnoncesService();
            $isOk = $annoncesService->setAnnonce(
                $_POST['id'],
                $_POST['lieu_depart'],
                $_POST['lieu_arrivee'],
                $_POST['date_depart'],
                $_POST['date_arrivee'],
                $_POST['utilisateur']
            );
            if ($isOk) {
                $result_update = 'Annonce mise à jour avec succès.';
            } else {
                $result_update = 'Erreur lors de la mise à jour de l\{annonce.';
            }
        }

        $usersService = new UsersService();
        $_users = $usersService->getUsers();

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
