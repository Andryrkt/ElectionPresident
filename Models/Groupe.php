<?php

namespace Models;

class Groupe extends Model
{
    protected string $table = 'groupe';
    
    private int $idGroupe;
    private string $nom;


    public function getId()
    {
        return $this->idGroupe;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    
    public function getNom() 
    {
        return $this->nom;
    }
}