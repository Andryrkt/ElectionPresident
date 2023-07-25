<?php

namespace Controllers;

use Models\Role;
use Source\Renderer;


class RoleController
{

    public function formulaireRole(): Renderer
    {       
        return Renderer::make('home/formulaireRole', []);
    }

    public function addRole()
    {
        $userModel = new Role();
        $userModel->insertData($_POST);
        return header('Location:/andranapoo/public/'); 
    }

}