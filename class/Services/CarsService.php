<?php

namespace App\Services;

use App\Entities\Car;
use DateTime;

class CarsService
{
    public function setCar(?int $id, string $marque, string $couleur, string $mise_circulation, int $puissanceMoteur, string $modele): bool
    {
        $result = false;

        $dataBaseService = new DataBaseService();
        $circulationDate = new DateTime($mise_circulation);

        if(empty($id)) {
            $result = $dataBaseService->createCar($marque, $couleur, $circulationDate, $puissanceMoteur, $modele);
        } else {
            $result = $dataBaseService->updateCar($id, $marque, $couleur, $circulationDate, $puissanceMoteur, $modele);
        }

        return $result;
    }

    public function getCars(): array
    {
        $_cars = array();

        $dataBaseService = new DataBaseService();
        $carsDTO = $dataBaseService->getCars();
        if(!empty($carsDTO)) {
            foreach($carsDTO as $carDTO) {
                $car = new Car();
                $car->setId($carDTO['id']);
                $car->setMarque($carDTO['marque']);
                $car->setCouleur($carDTO['couleur']);
                $car->setPuissanceMoteur($carDTO['puissance_moteur']);
                $car->setModele($carDTO['modele']);

                $date = new DateTime($carDTO['mise_circulation']);
                if($date !== false) {
                    $car->setCirculation($date);
                }

                $_cars[] = $car;
            }
        }

        return $_cars;
    }
    
    public function deleteCar(string $id): bool
    {
        $result = false;

        $dataBaseService = new DataBaseService();
        $result = $dataBaseService->deleteCar($id);

        return $result;
    }
}