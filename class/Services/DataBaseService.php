<?php

namespace App\Services;

use DateTime;
use Exception;
use PDO;

class DataBaseService
{
    const HOST = '127.0.0.1';
    const PORT = '3306';
    const DATABASE_NAME = 'carpooling';
    const MYSQL_USER = 'root';
    const MYSQL_PASSWORD = '';

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DATABASE_NAME,
                self::MYSQL_USER,
                self::MYSQL_PASSWORD
            );
            $this->connection->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Create an user.
     */
    public function createUser(string $firstname, string $lastname, string $email, DateTime $birthday): string
    {
        $userId = '';

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format('Y-m-d H:i:s'),
        ];
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        if ($isOk) {
            $userId = $this->connection->lastInsertId();
        }

        return $userId;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $sql = 'SELECT * FROM users';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
    }

    /**
     * Update an user.
     */
    public function updateUser(string $id, string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format('Y-m-d H:i:s'),
        ];
        $sql = 'UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, birthday = :birthday WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $result = false;
        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM users WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        /* Delete relations with user after its deletion */
        if($isOk) {
            $result = $this->deleteUserCars($id);
        }

        return $result;
    }

    /**
     * Créer une voiture
     */
    public function createCar(string $marque, string $couleur, DateTime $circulation, int $puissanceMoteur, string $modele): bool
    {
        $result = false;

        $data = [
            'marque' => $marque,
            'couleur' => $couleur,
            'mise_circulation' => $circulation->format('Y-m-d H:i:s'),
            'puissance_moteur' => $puissanceMoteur,
            'modele' => $modele
        ];

        $sql = 'INSERT INTO cars (marque, couleur, mise_circulation, puissance_moteur, modele) VALUES (:marque, :couleur, :mise_circulation, :puissance_moteur, :modele)';
        $query = $this->connection->prepare($sql);
        $result = $query->execute($data);

        return $result;
    }
    /**
     * Récupérer toutes les voitures
     */
    public function getCars(): array
    {
        $_cars = [];

        $sql = 'SELECT * FROM cars';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $_cars = $results;
        }

        return $_cars;
    }
    /**
     * Mettre à jour une voiture
     */
    public function updateCar(int $id, string $marque, string $couleur, DateTime $circulation, int $puissanceMoteur, string $modele): bool
    {
        $result = false;

        $data = [
            'id' => $id,
            'marque' => $marque,
            'couleur' => $couleur,
            'puissance_moteur' => $puissanceMoteur,
            'mise_circulation' => $circulation->format('Y-m-d H:i:s'),
            'modele' => $modele
        ];
        $sql = 'UPDATE cars SET marque = :marque, couleur = :couleur, puissance_moteur = :puissance_moteur, mise_circulation = :mise_circulation, :modele = modele WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $result = $query->execute($data);

        return $result;
    }
    /**
     * Supprimer une voiture
     */
    public function deleteCar(int $id): bool
    {
        $result = false;
        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM cars WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $result = $query->execute($data);

        return $result;
    }
    /**
     * Créer une réservations
     */
    public function createReservation(DateTime $date_depart, string $lieu_depart, string $lieu_arrivee): string
    {
        $reservationId = '';

        $data = [
            'date_depart' => $date_depart->format('Y-m-d H:i:s'),
            'lieu_depart' => $lieu_depart,
            'lieu_arrivee' => $lieu_arrivee,
        ];
        $sql = 'INSERT INTO reservations (date_depart, lieu_depart, lieu_arrivee) VALUES (:date_depart, :lieu_depart, :lieu_arrivee)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        if ($isOk) {
            $reservationId = $this->connection->lastInsertId();
        }

        return $reservationId;
    }
    /**
     * Mettre à jour une réservation
     */
    public function updateReservation(int $id, DateTime $date_depart, string $lieu_depart, string $lieu_arrivee): bool
    {
        $result = false;

        $data = [
            'id' => $id,
            'date_depart' => $date_depart->format('Y-m-d H:i:s'),
            'lieu_depart' => $lieu_depart,
            'lieu_arrivee' => $lieu_arrivee,
        ];
        $sql = 'UPDATE reservations SET date_depart = :date_depart, lieu_depart = :lieu_depart, lieu_arrivee = :lieu_arrivee WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $result = $query->execute($data);

        return $result;
    }
    /**
     * Récupérer toutes les réservations
     */
    public function getReservations(): array
    {
        $_reservations = [];

        $sql = 'SELECT * FROM reservations';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $_reservations = $results;
        }

        return $_reservations;
    }
    /**
     * Supprimer une réservation
     */
    public function deleteReservation(int $id): bool
    {
        $result = false;
        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM reservations WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $result = $query->execute($data);

        return $result;
    }

    /**
     * Créer une réservations
     */
    public function createAnnonce(string $lieu_depart, string $lieu_arrivee, DateTime $date_depart, DateTime $date_arrivee): string
    {
        $annonceId = '';

        $data = [
            'lieu_depart' => $lieu_depart,
            'lieu_arrivee' => $lieu_arrivee,
            'date_depart' => $date_depart->format('Y-m-d H:i:s'),
            'date_arrivee' => $date_arrivee->format('Y-m-d H:i:s'),
        ];
        $sql = 'INSERT INTO annonces (lieu_depart, lieu_arrivee, date_depart, date_arrivee) VALUES (:lieu_depart, :lieu_arrivee, :date_depart, :date_arrivee)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        if($isOk) {
            $annonceId = $this->connection->lastInsertId();
        }
        return $annonceId;
    }
    /**
     * Mettre à jour une annonce
     */
    public function updateAnnonce(int $id, string $lieu_depart, string $lieu_arrivee, DateTime $date_depart, DateTime $date_arrivee): bool
    {
        $result = false;

        $data = [
            'id' => $id,
            'lieu_depart' => $lieu_depart,
            'lieu_arrivee' => $lieu_arrivee,
            'date_depart' => $date_depart->format('Y-m-d H:i:s'),
            'date_arrivee' => $date_arrivee->format('Y-m-d H:i:s'),
        ];
        $sql = 'UPDATE annonces SET lieu_depart = :lieu_depart, lieu_arrivee = :lieu_arrivee, date_depart = :date_depart, date_arrivee = :date_arrivee WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $result = $query->execute($data);

        return $result;
    }
    /**
     * Récupérer toutes les annonces
     */
    public function getAnnonces(): array
    {
        $_annonces = [];

        $sql = 'SELECT * FROM annonces';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $_annonces = $results;
        }

        return $_annonces;
    }
    /**
     * Supprimer une annonce
     */
    public function deleteAnnonce(int $id): bool
    {
        $result = false;
        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM annonces WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $result = $query->execute($data);

        return $result;
    }

    /**
     * Créer un commentaire
     */
    public function createComment(string $titre, string $contenu, int $utilisateur, DateTime $date_ecriture): bool
    {
        $result = false;

        $data = [
            'titre' => $titre,
            'contenu' => $contenu,
            'utilisateur' => $utilisateur,
            'date_ecriture' => $date_ecriture->format('Y-m-d H:i:s'),
        ];
        $sql = 'INSERT INTO comments (titre, contenu, utilisateur, date_ecriture) VALUES (:titre, :contenu, :utilisateur, :date_ecriture)';
        $query = $this->connection->prepare($sql);
        $result = $query->execute($data);

        return $result;
    }
    /**
     * Mettre à jour un commentaire
     */
    public function updateComment(int $id, string $titre, string $contenu, int $utilisateur, DateTime $date_ecriture): bool
    {
        $result = false;

        $data = [
            'id' => $id,
            'titre' => $titre,
            'contenu' => $contenu,
            'utilisateur' => $utilisateur,
            'date_ecriture' => $date_ecriture->format('Y-m-d H:i:s'),
        ];
        $sql = 'UPDATE comments SET titre = :titre, contenu = :contenu, utilisateur = :utilisateur, date_ecriture = :date_ecriture WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $result = $query->execute($data);

        return $result;
    }
    /**
     * Récupérer tous les commentaires
     */
    public function getComments(): array
    {
        $_annonces = [];

        $sql = 'SELECT * FROM comments';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $_annonces = $results;
        }

        return $_annonces;
    }
    /**
     * Supprimer un commentaire
     */
    public function deleteComment(int $id): bool
    {
        $result = false;
        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM comments WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $result = $query->execute($data);

        return $result;
    }
    /**
    * Create relation bewteen an user and his car.
    */
    public function setUserCar(string $userId, string $carId): bool
    {
        $isOk = false;

        $data = [
            'userId' => $userId,
            'carId' => $carId,
        ];
        $sql = 'INSERT INTO users_cars (user_id, car_id) VALUES (:userId, :carId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Get cars of given user id.
     */
    public function getUserCars(string $userId): array
    {
        $_userCars = array();

        $data = [
            'userId' => $userId,
        ];
        $sql = '
            SELECT c.*
            FROM cars as c
            LEFT JOIN users_cars as uc ON uc.car_id = c.id
            WHERE uc.user_id = :userId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $_userCars = $results;
        }

        return $_userCars;
    }
    
    public function deleteUserCars(string $userId): bool
    {
        $result = false;

        $data = [
            'userId' => $userId,
        ];
        $sql = 'DELETE FROM users_cars WHERE user_id = :userId';
        $query = $this->connection->prepare($sql);
        $result = $query->execute($data);

        return $result;
    }

    public function getUserAnnonces(string $userId): array
    {
        $_userAnnonces = array();

        $data = [
            'userId' => $userId,
        ];
        $sql = '
            SELECT a.*
            FROM annonces as a
            LEFT JOIN users_annonces as ua ON ua.annonce_id = a.id
            WHERE ua.user_id = :userId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $_userAnnonces = $results;
        }

        return $_userAnnonces;
    }

    public function getUserReservations(string $userId): array
    {
        $_userReservations = array();

        $data = [
            'userId' => $userId,
        ];
        $sql = '
            SELECT r.*
            FROM reservations as r
            LEFT JOIN users_reservations as ur ON ur.reservation_id = r.id
            WHERE ur.user_id = :userId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $_userReservations = $results;
        }

        return $_userReservations;
    }

    public function setAnnonceUsers(string $annonceId, string $userId): bool
    {
        $isOk = false;

        $data = [
            'userId' => $userId,
            'annonceId' => $annonceId,
        ];
        $sql = 'INSERT INTO users_annonces (user_id, annonce_id) VALUES (:userId, :annonceId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    public function getAnnonceUsers(string $annonceId): array
    {
        $_annonceUsers = array();

        $data = [
            'annonceId' => $annonceId,
        ];
        $sql = '
            SELECT u.*
            FROM users as u
            LEFT JOIN users_annonces as ua ON ua.user_id = u.id
            WHERE ua.annonce_id = :annonceId';

        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $_annonceUsers = $results;
        }

        return $_annonceUsers;
    }
    public function deleteAnnonceUser(string $annonceId): bool
    {
        $result = false;

        $data = [
            'annonceId' => $annonceId,
        ];
        $sql = 'DELETE FROM users_annonces WHERE annonce_id = :annonceId';
        $query = $this->connection->prepare($sql);
        $result = $query->execute($data);

        return $result;
    }

    public function setReservationUsers(string $reservationId, string $userId): bool
    {
        $isOk = false;

        $data = [
            'userId' => $userId,
            'reservationId' => $reservationId,
        ];
        $sql = 'INSERT INTO users_reservations (user_id, reservation_id) VALUES (:userId, :reservationId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    public function getReservationUsers(string $reservationId): array
    {
        $_reservationUsers = array();

        $data = [
            'reservationId' => $reservationId,
        ];
        $sql = '
            SELECT u.*
            FROM users as u
            LEFT JOIN users_reservations as ur ON ur.user_id = u.id
            WHERE ur.reservation_id = :reservationId';

        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $_reservationUsers = $results;
        }

        return $_reservationUsers;
    }
}
