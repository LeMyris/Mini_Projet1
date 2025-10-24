<?php

class Hero
{
    //attriburs
    private $nom;
    private $capacite;


    //méthodes
    public function avancer(){
        echo"je suis une ".$this->marque." et J'avance, ";
    }
    public function __construct($nom, $capacite)
    {
        $this->nom = $nom;
        $this->capacite = $capacite;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($valeur)
    {
        $this->nom =$valeur;
    }
    public function getCapacite()
    {
        return $this->capacite;
    }
    public function setCapacite($valeur)
    {
        $this->Capacite =$valeur;
    }

}