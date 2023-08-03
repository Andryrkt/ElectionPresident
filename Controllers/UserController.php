<?php

namespace Controllers;

use Models\User;
use Source\Renderer;


class UserController
{

    public function formulaire(): Renderer
    {       
        return Renderer::make('home/formulaireUser', []);
    }

    public function add()
    {
        $userModel = new User();
        $userModel->insertData($_POST);
        return header('Location:/andranapoo/public/');    
    }

}