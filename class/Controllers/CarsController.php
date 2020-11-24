<?php

namespace App\Controllers;

use App\Services\CarsService;

class CarsController
{
    public function createCar(): void
    {
        $result_create = '';
        if (isset($_POST['marque']) &&
           isset($_POST['couleur']) &&
           isset($_POST['mise_circulation']) &&
           isset($_POST['puissance_moteur']) &&
           isset($_POST['modele'])) {
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                null,
                $_POST['marque'],
                $_POST['couleur'],
                $_POST['mise_circulation'],
                $_POST['puissance_moteur'],
                $_POST['modele']
            );
            if ($isOk) {
                $result_create = 'Voiture enregistrée avec succès.';
            } else {
                $result_create = 'Erreur lors de l\'enregistrement de la voiture.';
            }
        }

        require 'views/car/car_create.php';
    }

    public function getCars(): void
    {
        $carsService = new CarsService();
        $_cars = $carsService->getCars();

        require 'views/car/car_read.php';
    }

    public function updateCar(): void
    {
        $result_update = '';
        if (isset($_POST['id']) &&
           isset($_POST['marque']) &&
           isset($_POST['couleur']) &&
           isset($_POST['mise_circulation']) &&
           isset($_POST['puissance_moteur']) &&
           isset($_POST['modele'])) {
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                $_POST['id'],
                $_POST['marque'],
                $_POST['couleur'],
                $_POST['mise_circulation'],
                $_POST['puissance_moteur'],
                $_POST['modele']
            );
            if ($isOk) {
                $result_update = 'Voiture mise à jour avec succès.';
            } else {
                $result_update = 'Erreur lors de la mise à jour de la voiture.';
            }
        }

        require 'views/car/car_update.php';
    }

    public function deleteCar(): void
    {
        $result_delete = '';

        if (isset($_POST['id'])) {
            $carsService = new CarsService();
            $isOk = $carsService->deleteCar($_POST['id']);
            if ($isOk) {
                $result_delete = 'Voiture supprimée avec succès.';
            } else {
                $result_delete = 'Erreur lors de la supression de la voiture.';
            }
        }

        require 'views/car/car_delete.php';
    }
}
