<?php

namespace Controllers;

use Models\User;
use Source\Renderer;


class addUserController
{

    public function formulaireUser(): Renderer
    {       
        return Renderer::make('home/formulaireUser', []);
    }

    public function addUser()
    {
        $userModel = new User();
        $userModel->insertData($_POST);
        return header('Location:/andranapoo/public/');
        
    }

}