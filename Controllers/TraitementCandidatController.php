<?php

namespace Controllers;

use Models\Candidat;
use Source\Renderer;


class TraitementCandidatController
{
    private function estBattu() : bool
    {
        $CandidatModel = new Candidat();
        $candidats = $CandidatModel->all();
        return $candidats[0]->score < 12.5;
    }
    
    private function estElu() : bool
    {
        $CandidatModel = new Candidat();
        $candidats = $CandidatModel->all();
        return $candidats[0]->score > 50;
    }

    private function estEnBallottageFavorable() : bool 
    {
        $CandidatModel = new Candidat();
        $candidats = $CandidatModel->all();
        $cand1 = $candidats[0]->score;
        $cand2 = $candidats[1]->score;
        $cand3 = $candidats[2]->score;
        $cand4 = $candidats[3]->score;
                
        $condition1 = ($cand2 < $cand1 && $cand3 < $cand1 && $cand4 < $cand1);
        $condition2 = !$this->estBattu() && !$this->estElu();
        return $condition1 && $condition2;
    }
    
    private function estEnBallottageDefavorable() : bool 
    {
        return !$this->estBattu() && !$this->estElu() && !$this->estEnBallottageFavorable();
    }

    public function logique()
    {
        $CandidatModel = new Candidat();
        $candidats = $CandidatModel->all();
        $message = null;
        if ($this->estElu()) {
            $message = "Le candidat numéro 1 est élu dès le premier tour.";
        } elseif ($this->estEnBallottageFavorable()) {
            $message = "Le candidat numéro 1 est en ballottage favorable.";
        } elseif ($this->estEnBallottageDefavorable()) {
            $message = "Le candidat numéro 1 est en ballottage défavorable.";
        } else {
            $message = "Le candidat numéro 1 est battu ou éliminé.";
        }

        return Renderer::make('home/resultatVote', compact('candidats', 'message' ));
    }
}