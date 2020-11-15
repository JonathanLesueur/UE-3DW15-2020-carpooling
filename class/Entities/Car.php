<?php

namespace App\Entities;

use DateTime;

class Car {
    private $id;
    private $marque;
    private $couleur;
    private $mise_circulation;
    private $puissanceMoteur;
    private $modele;
    

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
     * Get the value of marque
     */ 
    public function getMarque(): string
    {
        return $this->marque;
    }

    /**
     * Set the value of marque
     *
     * @return  self
     */ 
    public function setMarque(string $marque): void
    {
        $this->marque = $marque;
    }

    /**
     * Get the value of couleur
     */ 
    public function getCouleur(): string
    {
        return $this->couleur;
    }

    /**
     * Set the value of couleur
     *
     * @return  self
     */ 
    public function setCouleur(string $couleur): void
    {
        $this->couleur = $couleur;    
    }

    /**
     * Get the value of mise_circulation
     */ 
    public function getCirculation(): DateTime
    {
        return $this->mise_circulation;
    }

    /**
     * Set the value of mise_circulation
     *
     * @return  self
     */ 
    public function setCirculation(DateTime $mise_circulation): void
    {
        $this->mise_circulation = $mise_circulation;
    }

    /**
     * Get the value of $puissanceMoteur
     */ 
    public function getPuissanceMoteur(): int
    {
        return $this->puissanceMoteur;
    }

    /**
     * Set the value of $puissanceMoteur
     *
     * @return  self
     */ 
    public function setPuissanceMoteur(int $puissanceMoteur): void
    {
        $this->puissance_moteur = $puissanceMoteur;
    }

    /**
     * Get the value of modele
     */ 
    public function getModele(): string
    {
        return $this->modele;
    }

    /**
     * Set the value of modele
     *
     * @return  self
     */ 
    public function setModele($modele): void
    {
        $this->modele = $modele;
    }
}