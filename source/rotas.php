<?php
namespace MyPet\Rotas;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$rotas = new RouteCollection();

$rotas->add('paginainicial', new Route('/',
        array('_controller' => 'MyPet\Controller\ControllerShowView',
            "method" => 'showPaginaInicial', 'suffix' => '')));

$rotas->add('paginacontato', new Route('/formcontato/{suffix}',
        array('_controller' => 'MyPet\Controller\ControllerContato',
            "method" => 'showPaginaContato', 'suffix' => '')));

$rotas->add('contato', new Route('/contato',
        array('_controller' => 'MyPet\Controller\ControllerContato',
            "method" => 'InserirContato', 'suffix' => '')));

$rotas->add('paginacadastro', new Route('/formcadastro/{suffix}',
        array('_controller' => 'MyPet\Controller\ControllerCadastro',
            "method" => 'showPaginaCadastro', 'suffix' => '')));

$rotas->add('cadastro', new Route('/cadastro',
        array('_controller' => 'MyPet\Controller\ControllerCadastro',
            "method" => 'InserirUsuario', 'suffix' => '')));

$rotas->add('paginalogin', new Route('/formlogin/{suffix}',
        array('_controller' => 'MyPet\Controller\ControllerLogin',
            "method" => 'showPaginaLogin', 'suffix' => '')));
$rotas->add('login', new Route('/login',
        array('_controller' => 'MyPet\Controller\ControllerLogin',
            "method" => 'efetuarLogin', 'suffix' => '')));
return $rotas;