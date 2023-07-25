<?php

namespace Controllers;

use Models\Candidat;
use Source\Renderer;


class CandidatController
{

    public function formulaireCandidat(): Renderer
    {       
        return Renderer::make('home/formulaireCandidat', []);
    }

    public function addCandidat()
    {
        $CandidatModel = new Candidat();
        $CandidatModel->insertData($_POST);
        return header('Location:/andranapoo/public/listCandidat'); 
    }


    public function listCandidat(): Renderer
    {
        $CandidatModel = new Candidat();
        $candidats = $CandidatModel->all();

        return Renderer::make('home/listCandidat', compact('candidats'));
    }

    public function edit(int $id)
    {
        $candidats = (new Candidat())->findById($id);
        return Renderer::make('home/formulaireEditCandidat', compact('candidats'));   
    }

    public function update(int $id)
    {
        $CandidatModel = new Candidat();
        $result = $CandidatModel->update($id, $_POST);
        if($result)
        {
            return header('Location:/andranapoo/public/listCandidat');
        }
    }

    public function destroy(int $id)
    {
        $CandidatModel = new Candidat();
        $result = $CandidatModel->destroy($id);

        if($result)
        {
            return header('Location:/andranapoo/public/listCandidat');
        }
    }

   
}