<?php

class Hero
{
    //attributs
    private $id;
    private $nom;
    private $alias;
    private $capacite;
    private $origine;
    private $affiliation;

    //méthodes
    public function __construct($id, $nom, $alias, $capacite, $origine, $affiliation)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->alias = $alias;
        $this->capacite = $capacite;
        $this->origine = $origine;
        $this->affiliation = $affiliation;
    }
    
    public function getId()
    {
        return $this->id;
    }
    public function setId($valeur)
    {
        $this->id =$valeur;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($valeur)
    {
        $this->nom =$valeur;
    }

    public function getAlias()
    {
        return $this->alias;
    }
    public function setAlias($valeur)
    {
        $this->alias =$valeur;
    }

    public function getCapacite()
    {
        return $this->capacite;
    }
    public function setCapacite($valeur)
    {
        $this->Capacite =$valeur;
    }

    public function getOrigine()
    {
        return $this->origine;
    }
    public function setOrigine($valeur)
    {
        $this->origine =$valeur;
    }

    public function getAffiliation()
    {
        return $this->affiliation;
    }
    public function setAffiliation($valeur)
    {
        $this->affiliation =$valeur;
    }

    public function __toString(){
        return " ".$this->id ." ".$this->nom." ".$this->alias." ".$this->capacite." ".$this->origine." ".$this->affiliation;
    }

}