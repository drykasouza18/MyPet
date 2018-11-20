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
        array('_controller' => 'MyPet\Controller\ControllerShowView',
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

$rotas->add('paginainiciall', new Route('/indexl',
        array('_controller' => 'MyPet\Controller\ControllerLogado',
            "method" => 'showPaginaInicialL', 'suffix' => '')));

$rotas->add('listaradotar', new Route('/listaradotar',
        array('_controller' => 'MyPet\Controller\ControllerLogado',
            "method" => 'showPaginaListaAdotar', 'suffix' => '')));

$rotas->add('lista', new Route('/listamascotes',
        array('_controller' => 'MyPet\Controller\ControllerDoacao',
            "method" => 'listarMascoteDoacao', 'suffix' => '')));


$rotas->add('formulariodoacao', new Route('/formdoar',
        array('_controller' => 'MyPet\Controller\ControllerLogado',
            "method" => 'showPaginaDoar', 'suffix' => '')));


$rotas->add('inserirdoacao', new Route('/doar',
        array('_controller' => 'MyPet\Controller\ControllerDoacao',
            "method" => 'cadastrarDoacao', 'suffix' => '')));


$rotas->add('mostrardoaco', new Route('/logout',
        array('_controller' => 'MyPet\Controller\ControllerLogin',
            "method" => 'efetuarLogout', 'suffix' => '')));
return $rotas;