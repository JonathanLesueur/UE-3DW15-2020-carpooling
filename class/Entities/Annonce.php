<?php

namespace App\Entities;

use DateTime;

class Annonce
{
    private $id;
    private $lieu_depart;
    private $lieu_arrivee;
    private $date_depart;
    private $date_arrivee;

    /* Préparation pour la suite */
    private $utilisateur;
    private $voiture;
    private $commentaires;
    private $reservations;

    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(int $id): void
    {
        $this->id = $id;
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
     * Get the value of date_arrivee
     */ 
    public function getDateArrivee(): DateTime
    {
        return $this->date_arrivee;
    }

    /**
     * Set the value of date_arrivee
     *
     * @return  self
     */ 
    public function setDateArrivee(DateTime $date_arrivee): void
    {
        $this->date_arrivee = $date_arrivee;
    }
}
