<?php

namespace App\Services;

use App\Entities\Car;
use App\Entities\Annonce;
use App\Entities\Reservation;
use App\Entities\User;
use DateTime;

class UsersService
{
    /**
     * Create or update an user.
     */
    public function setUser(?string $id, string $firstname, string $lastname, string $email, string $birthday): string
    {
        $userId = '';

        $dataBaseService = new DataBaseService();
        $birthdayDateTime = new DateTime($birthday);
        if (empty($id)) {
            $userId = $dataBaseService->createUser($firstname, $lastname, $email, $birthdayDateTime); 
        } else {
            $dataBaseService->updateUser($id, $firstname, $lastname, $email, $birthdayDateTime);
            $userId = $id;
        }

        return $userId;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $dataBaseService = new DataBaseService();
        $usersDTO = $dataBaseService->getUsers();
        if (!empty($usersDTO)) {
            foreach ($usersDTO as $userDTO) {
                $user = new User();
                $user->setId($userDTO['id']);
                $user->setFirstname($userDTO['firstname']);
                $user->setLastname($userDTO['lastname']);
                $user->setEmail($userDTO['email']);
                $date = new DateTime($userDTO['birthday']);
                if ($date !== false) {
                    $user->setbirthday($date);
                }

                $_cars = $this->getUserCars($userDTO['id']);
                $user->setVoitures($_cars);

                $_annonces = $this->getUserAnnonces($userDTO['id']);
                $user->setAnnonces($_annonces);

                $_reservations = $this->getUserReservations($userDTO['id']);
                $user->setReservations($_reservations);

                $users[] = $user;
            }
        }

        return $users;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteUser($id);

        return $isOk;
    }

    /**
     * Create relation bewteen an user and his car.
     */
    public function setUserCar(string $userId, string $carId): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->setUserCar($userId, $carId);

        return $isOk;
    }

    /**
     * Get cars of given user id.
     */
    public function getUserCars(string $userId): array
    {
        $_userCars = array();

        $dataBaseService = new DataBaseService();

        // Get relation users and cars :
        $usersCarsDTO = $dataBaseService->getUserCars($userId);
        if (!empty($usersCarsDTO)) {
            foreach ($usersCarsDTO as $userCarDTO) {
                $car = new Car();
                $car->setId($userCarDTO['id']);
                $car->setMarque($userCarDTO['marque']);
                $car->setModele($userCarDTO['modele']);
                $car->setCouleur($userCarDTO['couleur']);
                $car->setPuissanceMoteur($userCarDTO['puissance_moteur']);

                $date = new DateTime($userCarDTO['mise_circulation']);
                if ($date !== false) {
                    $car->setCirculation($date);
                }

                $_userCars[] = $car;
            }
        }

        return $_userCars;
    }

    public function getUserAnnonces(string $userId): array
    {
        $_userAnnonces = array();

        $dataBaseService = new DataBaseService();
        $userAnnoncesDTO = $dataBaseService->getUserAnnonces($userId);
        if(!empty($userAnnoncesDTO)) {
            foreach($userAnnoncesDTO as $userAnnonceDTO) {
                $annonce = new Annonce();
                
                $annonce->setId($userAnnonceDTO['id']);
                $annonce->setLieuDepart($userAnnonceDTO['lieu_depart']);
                $annonce->setLieuArrivee($userAnnonceDTO['lieu_arrivee']);
                
                $dateDepart = new DateTime($userAnnonceDTO['date_depart']);
                if($dateDepart) {
                    $annonce->setDateDepart($dateDepart);
                }
                
                $dateArrivee = new DateTime($userAnnonceDTO['date_arrivee']);
                if($dateArrivee) {
                    $annonce->setDateArrivee($dateArrivee);
                }

                $_userAnnonces[] = $annonce;
            }
        }

        return $_userAnnonces;
    }

    public function getUserReservations(string $userId): array
    {
        $_userReservations = array();

        $dataBaseService = new DataBaseService();
        $userReservationsDTO = $dataBaseService->getUserReservations($userId);
        if(!empty($userReservationsDTO)) {
            foreach($userReservationsDTO as $userReservationDTO) {
                $reservation = new Reservation();

                $reservation->setId($userReservationDTO['id']);
                $reservation->setLieuDepart($userReservationDTO['lieu_depart']);
                $reservation->setLieuArrivee($userReservationDTO['lieu_arrivee']);

                $dateDepart = new DateTime($userReservationDTO['date_depart']);
                if($dateDepart) {
                    $reservation->setDateDepart($dateDepart);
                }
                
                $_userReservations[] = $reservation;
            }
        }

        return $_userReservations;
    }
}
