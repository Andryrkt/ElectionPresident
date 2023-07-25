<?php

use Source\App;
use Router\Router;

require './../vendor/autoload.php';

define('BASE_VIEW_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);
define('CSS_PATH_BOOTSTRAP', 'CSS/bootstrap-5.3.0/css/bootstrap.css');
define('CSS_PATH', 'CSS/style.css');

$router = new Router();

//User
$router->get('/andranapoo/public/listUser', ['Controllers\HomeController', 'index']);

$router->get('/andranapoo/public/addUser', ['Controllers\addUserController', 'formulaireUser']);
$router->post('/andranapoo/public/addUser', ['Controllers\addUserController', 'addUser']);
$router->get('/andranapoo/public/deleteUser', ['Controllers\HomeController', 'destroy']);
$router->get('/andranapoo/public/editUser', ['Controllers\HomeController', 'edit']);
$router->post('/andranapoo/public/editUser', ['Controllers\HomeController', 'update']);

//Groupe
$router->get('/andranapoo/public/addGroupe', ['Controllers\GroupeController', 'formulaireGroupe']);
$router->post('/andranapoo/public/addGroupe', ['Controllers\GroupeController', 'addGroupe']);

//Role
$router->get('/andranapoo/public/addRole', ['Controllers\RoleController', 'formulaireRole']);
$router->post('/andranapoo/public/addRole', ['Controllers\RoleController', 'addRole']);

//Candidat
$router->get('/andranapoo/public/addCandidat', ['Controllers\CandidatController', 'formulaireCandidat']);
$router->post('/andranapoo/public/addCandidat', ['Controllers\CandidatController', 'addCandidat']);
$router->get('/andranapoo/public/listCandidat', ['Controllers\CandidatController', 'listCandidat']);
$router->get('/andranapoo/public/deleteCandidat', ['Controllers\CandidatController', 'destroy']);
$router->get('/andranapoo/public/editCandidat', ['Controllers\CandidatController', 'edit']);
$router->post('/andranapoo/public/editCandidat', ['Controllers\CandidatController', 'update']);
$router->get('/andranapoo/public/resultat', ['Controllers\TraitementCandidatController', 'logique']);

//Login
$router->get('/andranapoo/public/', ['Controllers\LoginController', 'formulaireLogin']);
$router->post('/andranapoo/public/', ['Controllers\LoginController', 'loginPost']);
$router->get('/andranapoo/public/logout', ['Controllers\LoginController', 'logout']);



(new App($router,[ 
        'uri' => $_SERVER['REQUEST_URI'], 
        'method' => $_SERVER['REQUEST_METHOD']
    ]
    ))->run();