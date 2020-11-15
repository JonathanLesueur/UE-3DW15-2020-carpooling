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
    public function createUser(string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
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
        $isOk = false;
        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM users WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
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
    public function updateCar(int $id, string $marque, string $couleur, DateTime $circulation, int $puissanceMoteur, string $modele): bool
    {
        $result = false;

        $data = [
            'id' => $id,
            'marque' => $marque,
            'couleur' => $couleur,
            'puissance_moteur' => $puissanceMoteur,
            'mise_circulation' => $circulation->format(DateTime::RFC3339),
            'modele' => $modele
        ];
        $sql = 'UPDATE cars SET marque = :marque, couleur = :couleur, puissance_moteur = :puissance_moteur, mise_circulation = :mise_circulation, :modele = modele WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $result = $query->execute($data);

        return $result;
    }
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

}
