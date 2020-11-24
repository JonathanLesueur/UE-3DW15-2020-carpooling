<?php

namespace App\Entities;

use DateTime;

class Reservation
{
    private $id;
    private $date_depart;
    private $lieu_depart;
    private $lieu_arrivee;
    private $annonces;
    private $utilisateurs;

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
     * Get the value of date_depart
     */
    public function getDateDepart(): DateTime
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
    public function getLieuArrivee(): string
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

    public function setUtilisateurs(array $utilisateurs): void
    {
        $this->utilisateurs = $utilisateurs;
    }

    public function getUtilisateurs(): array
    {
        return $this->utilisateurs;
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
}
