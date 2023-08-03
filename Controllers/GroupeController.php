<?php

namespace Controllers;

use Models\Groupe;
use Source\Renderer;


class GroupeController
{

    public function formulaire(): Renderer
    {       
        return Renderer::make('home/formulaireGroupe', []);
    }

    public function add()
    {
        $userModel = new Groupe();
        $userModel->insertData($_POST);
        return header('Location:/andranapoo/public/'); 
    }

}