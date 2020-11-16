<?php

namespace App\Services;

use App\Entities\Annonce;
use DateTime;

class AnnoncesService
{
    public function setAnnonce(?int $id, string $lieu_depart, string $lieu_arrivee, DateTime $date_depart, DateTime $date_arrivee): bool
    {
        $result = false;

        $dataBaseService = new DataBaseService();
        $departDate = new DateTime($date_depart);
        $arriveeDate = new DateTime($date_arrivee);

        if(empty($id)) {
            $result = $dataBaseService->createAnnonce($lieu_depart, $lieu_arrivee, $departDate, $arriveeDate);
        } else {
            $result = $dataBaseService->updateAnnonce($id, $lieu_depart, $lieu_arrivee, $departDate, $arriveeDate);
        }

        return $result;
    }

    public function getAnnonces(): array
    {
        $_annonces = array();

        $dataBaseService = new DataBaseService();
        $annoncesDTO = $dataBaseService->getAnnonces();
        if(!empty($annoncesDTO)) {
            foreach($annoncesDTO as $annonceDTO) {
                $annonce = new Annonce();
                $annonce->setId($annonceDTO['id']);
                $annonce->setLieuDepart($annonceDTO['lieu_depart']);
                $annonce->setLieuArrivee($annonceDTO['lieu_arrivee']);

                $dateDepart = new DateTime($annonceDTO['date_depart']);
                $dateArrivee = new DateTime($annonceDTO['date_arrivee']);

                if($dateDepart !== false) {
                    $annonce->setDateDepart($dateDepart);
                }
                if($dateArrivee !== false) {
                    $annonce->setDateArrivee($dateArrivee);
                }

                $_annonces[] = $annonce;
            }
        }

        return $_annonces;
    }
    
    public function deleteCar(string $id): bool
    {
        $result = false;

        $dataBaseService = new DataBaseService();
        $result = $dataBaseService->deleteAnnonce($id);

        return $result;
    }
}