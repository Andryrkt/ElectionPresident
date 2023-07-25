<?php

namespace Controllers;

use Source\Renderer;

class Controller
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE)
        {
            session_start();
        }
    }


    protected function isLogged() : bool
    {
        if(isset($_SESSION['nom']))
        {
            return true;
        }
        return false;
    }

    protected function isAdmin()
    {
        if ($this->isLogged())
        {
            if (isset($_SESSION['idGroupe']) && $_SESSION['idGroupe'] == 1)
            {
                return true;
            } 
            return false;
        }
    }

    public function rendu()
    {
        if ($this->isLogged())
        {
            return Renderer::make('home/listUser', []);
        } else {
            return Renderer::make('home/index', []);
        }
    }
}