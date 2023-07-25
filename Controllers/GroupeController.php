<?php

namespace Controllers;

use Models\Groupe;
use Source\Renderer;


class GroupeController
{

    public function formulaireGroupe(): Renderer
    {       
        return Renderer::make('home/formulaireGroupe', []);
    }

    public function addGroupe()
    {
        $userModel = new Groupe();
        $userModel->insertData($_POST);
        return header('Location:/andranapoo/public/'); 
    }

}