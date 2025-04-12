<?php

use Api\Controller\{
    PrestadorController,
    ContratanteController
};

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


switch ($url) {
    //rotas prestador
    case '/prestador':
        PrestadorController::listar();
    break;

    case '/prestador/cadastro':
        PrestadorController::cadastro();
    break;
    case '/prestador/update':
        PrestadorController::update();
    break;
    case '/prestador/delete':
        PrestadorController::delete();
    break;

    //rotas contratante


    case '/contratante':
        ContratanteController::listar();
    break;

    case '/contratante/cadastro':
        ContratanteController::cadastro();
    break;
    case '/contratante/update':
        ContratanteController::update();
    break;
    case '/contratante/delete':
        ContratanteController::delete();
    break;

    
    default:
        # code...
        break;
}