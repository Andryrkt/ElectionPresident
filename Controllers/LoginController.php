<?php

namespace Controllers;

use Models\User;
use Source\Renderer;


class LoginController
{
    public function formulaireLogin(): Renderer
    {       
        return Renderer::make('home/index', []);
    }

    public function loginPost()
    { 
     
        $user = (new User())-> getByUser($_POST['nom']);
        
        if($user)
        { 
            if(password_verify($_POST['mdp'], $user->mdp))
            {   
                $_SESSION['nom'] = (int)$user->nom;
                $_SESSION['idGroupe'] = (int)$user->idGroupe;
                header('Location:/andranapoo/public/listUser?sucess=true');

            } else {
                return header('Location:/andranapoo/public/ ');
            }

        } else {
            return header('Location:/andranapoo/public/ ');
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        return header('Location:/andranapoo/public/ ');
    }
}