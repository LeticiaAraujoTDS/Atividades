<?php

require_once __DIR__ . '/../app/core/Autoload.php';
require_once __DIR__ . '/../app/config/Config.php';

use app\core\Router;

$router = new Router();

$router->get('/', 'AnimalController@listarTodos');

// Animal Routes
$router->get('/animais', 'AnimalController@listarTodos');
$router->get('/animais/animal', 'AnimalController@verAnimal');
$router->get('/animais/cadastrar', 'AnimalController@criar');

$router->post('/animais/salvar', 'AnimalController@salvar');
$router->get('/animais/editar', 'AnimalController@editar');
$router->post('/animais/atualizar', 'AnimalController@atualizar');
$router->get('/animais/excluir', 'AnimalController@excluir');
$router->get('/animais', 'AnimalController@listarTodos');
$router->get('/animais/ver', 'AnimalController@verAnimal');
$router->get('/animais/criar', 'AnimalController@criar');

$router->get('/usuarios', 'UsuarioController@index');
$router->get('/usuarios/cadastrar', 'UsuarioController@cadastrar');
$router->post('/usuarios/salvar', 'UsuarioController@salvar');
$router->get('/usuarios/editar', 'UsuarioController@editar');
$router->post('/usuarios/atualizar', 'UsuarioController@atualizar');
$router->get('/usuarios/excluir', 'UsuarioController@excluir');

//Autenticacao
$router->get('/login', 'AutenticacaoController@login');
$router->post('/logar', 'AutenticacaoController@logar');



$router->get('/teste', 'AnimalController@redirecionarTeste');


$router->run();