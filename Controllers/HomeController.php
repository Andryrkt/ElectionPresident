<?php

namespace Controllers;

use Models\User;
use Source\Renderer;


class HomeController extends Controller
{
    public function index(): Renderer
    {
       
        if ($this->isLogged())
        {
            $userModel = new User();
            $users = $userModel->all();
            return Renderer::make('home/listUser', compact('users'));
        } else {
            return Renderer::make('home/index', []);
        }
       
        
    }

    public function edit(int $id)
    {
        $users = (new User())->findById($id);
        return Renderer::make('home/formulaireEditUser', compact('users'));   
    }

    public function update(int $id)
    {
        $userModel = new User();
        $result = $userModel->update($id, $_POST);
        if($result)
        {
            return header('Location:/andranapoo/public/listUser');
        }
    }

    public function destroy(int $id)
    {
        $userModel = new User();
        $result = $userModel->destroy($id);

        if($result)
        {
            return header('Location:/andranapoo/public/listUser');
        }
    }
    
}