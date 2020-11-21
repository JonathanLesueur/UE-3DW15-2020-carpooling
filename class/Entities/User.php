<?php

namespace App\Entities;

use DateTime;

class User
{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $birthday;

    /* Préparation pour la suite */
    private $voitures;
    private $annonces;
    private $reservations;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getBirthday(): DateTime
    {
        return $this->birthday;
    }

    public function setBirthday(DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    /**
     * Get the value of voitures
     */ 
    public function getVoitures(): array
    {
        return $this->voitures;
    }

    /**
     * Set the value of voitures
     *
     * @return  self
     */ 
    public function setVoitures(array $voitures)
    {
        $this->voitures = $voitures;
    }

    /**
     * Get the value of annonces
     */ 
    public function getAnnonces(): array
    {
        return $this->annonces;
    }

    /**
     * Set the value of annonces
     *
     * @return  self
     */ 
    public function setAnnonces(array $annonces)
    {
        $this->annonces = $annonces;
    }

    /**
     * Get the value of reservations
     */ 
    public function getReservations(): array
    {
        return $this->reservations;
    }

    /**
     * Set the value of reservations
     *
     * @return  self
     */ 
    public function setReservations(array $reservations)
    {
        $this->reservations = $reservations;
    }
}
