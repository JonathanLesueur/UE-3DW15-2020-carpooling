<?php

namespace App\Entities;

use DateTime;

class Reservation
{
    private $id;
    private $utilisateur;
    private $date_depart;
    private $lieu_depart;
    private $lieu_arrivee;


    /**
     * Get the value of id
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * Get the value of utilisateur
     */
    public function getUtilisateur(): User
    {
        return $this->utilisateur;
    }

    /**
     * Set the value of utilisateur
     *
     * @return  self
     */
    public function setUtilisateur(User $utilisateur): void
    {
        $this->utilisateur = $utilisateur;
    }

    /**
     * Get the value of date_depart
     */
    public function getDate_depart(): DateTime
    {
        return $this->date_depart;
    }

    /**
     * Set the value of date_depart
     *
     * @return  self
     */
    public function setDateDepart(DateTime $date_depart): void
    {
        $this->date_depart = $date_depart;
    }

    /**
     * Get the value of lieu_depart
     */
    public function getLieuDepart(): string
    {
        return $this->lieu_depart;
    }

    /**
     * Set the value of lieu_depart
     *
     * @return  self
     */
    public function setLieuDepart(string $lieu_depart): void
    {
        $this->lieu_depart = $lieu_depart;
    }

    /**
     * Get the value of lieu_arrivee
     */
    public function getLieuArrive(): string
    {
        return $this->lieu_arrivee;
    }

    /**
     * Set the value of lieu_arrivee
     *
     * @return  self
     */
    public function setLieuArrivee(string $lieu_arrivee): void
    {
        $this->lieu_arrivee = $lieu_arrivee;
    }
}
