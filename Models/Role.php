<?php

namespace Models;

class Role extends Model 
{

    protected string $table = 'role';

    private int $idRole;
    private string $nom;


    public function getId()
    {
        return $this->idRole;
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