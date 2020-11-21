<?php

namespace App\Entities;

use DateTime;

class Comment
{
    private $id;
    private $titre;
    private $contenu;
    private $utilisateur;
    private $date_ecriture;
    

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
     * Get the value of titre
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * Get the value of contenu
     */
    public function getContenu(): string
    {
        return $this->contenu;
    }

    /**
     * Set the value of contenu
     *
     * @return  self
     */
    public function setContenu(string $contenu): void
    {
        $this->contenu= $contenu;
    }

    /**
     * Get the value of utilisateur
     */
    public function getUtilisateur(): string
    {
        return $this->utilisateur;
    }

    /**
     * Set the value of utilisateur
     *
     * @return  self
     */
    public function setUtilisateur(string $utilisateur): void
    {
        $this->utilisateur = $utilisateur;
    }

    /**
     * Get the value of date_ecriture
     */
    public function getDateEcriture(): DateTime
    {
        return $this->date_ecriture;
    }

    /**
     * Set the value of date_ecriture
     *
     * @return  self
     */
    public function setDateEcriture(DateTime $date_ecriture): void
    {
        $this->date_ecriture = $date_ecriture;
    }
}
