<?php

namespace Models;

class Candidat extends Model
{

    protected string $table = 'candidat';

    private $idCandidat;
    private $nom;
    private $numero;
    private $score;
    


    public function getId()
    {
        return $this->idCandidat;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    
    public function getNom() 
    {
        return $this->nom;
    }

    public function setScore($score)
    {
        $this->score = $score;
    }
    
    public function getScore() 
    {
        return $this->score;
    }
        
    public function getNumero() : bool
    {
        return $this->numero;
    }

    
}