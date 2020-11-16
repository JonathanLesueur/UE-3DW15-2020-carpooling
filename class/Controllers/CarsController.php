<?php

namespace App\Controllers;

use App\Services\CarsService;

class CarsController
{
    public function createCar(): string
    {
        $html = '';
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
                $html = 'Voiture enregistrée avec succès.';
            } else {
                $html = 'Erreur lors de l\'enregistrement de la voiture.';
            }
        }

        return $html;
    }

    public function getCars(): string
    {
        $html = '';

        $carsService = new CarsService();
        $cars = $carsService->getCars();

        foreach ($cars as $car) {
            $html .=
                '#' . $car->getId() . ' ' .
                $car->getMarque() . ' ' .
                $car->getModele() . ' ' .
                $car->getCouleur() . ' ' .
                $car->getCirculation()->format('d-m-Y') . '<br />';
        }

        return $html;
    }

    public function updateCar(): string
    {
        $html = '';
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
                $html = 'Voiture mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la voiture.';
            }
        }

        return $html;
    }

    public function deleteCar(): string
    {
        $html = '';

        if (isset($_POST['id'])) {
            $carsService = new CarsService();
            $isOk = $carsService->deleteCar($_POST['id']);
            if ($isOk) {
                $html = 'Voiture supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la voiture.';
            }
        }

        return $html;
    }
}
