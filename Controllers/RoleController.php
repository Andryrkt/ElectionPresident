<?php

namespace Controllers;

use Models\Role;
use Source\Renderer;


class RoleController
{

    public function formulaire(): Renderer
    {       
        return Renderer::make('home/formulaireRole', []);
    }

    public function add()
    {
        $userModel = new Role();
        $userModel->insertData($_POST);
        return header('Location:/andranapoo/public/'); 
    }

}