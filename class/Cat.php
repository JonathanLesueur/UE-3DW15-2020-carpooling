<?php

namespace App;

class Cat {
    private $name;
    public function __construct()
    {
        $this->name = 'Chaton Sama';
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}