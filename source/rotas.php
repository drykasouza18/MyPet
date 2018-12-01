<?php
namespace MyPet\Rotas;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$rotas = new RouteCollection();

// PAGINA INICIAL
$rotas->add('paginainicial', new Route('/',
        array('_controller' => 'MyPet\Controller\ControllerShowView',
            "method" => 'showPaginaInicial', 'suffix' => '')));

// ROTAS INSERIR CONTATO
$rotas->add('paginacontato', new Route('/formcontato/{suffix}',
        array('_controller' => 'MyPet\Controller\ControllerContato',
            "method" => 'showPaginaContato', 'suffix' => '')));

$rotas->add('contato', new Route('/contato',
        array('_controller' => 'MyPet\Controller\ControllerContato',
            "method" => 'InserirContato', 'suffix' => '')));

// ROTAS CADASTRAR NO SISTEMA
$rotas->add('paginacadastro', new Route('/formcadastro/{suffix}',
        array('_controller' => 'MyPet\Controller\ControllerShowView',
            "method" => 'showPaginaCadastro', 'suffix' => '')));

$rotas->add('cadastro', new Route('/cadastro',
        array('_controller' => 'MyPet\Controller\ControllerCadastro',
            "method" => 'InserirUsuario', 'suffix' => '')));

// ROTAS LOGAR NO SISTEMA
$rotas->add('paginalogin', new Route('/formlogin/{suffix}',
        array('_controller' => 'MyPet\Controller\ControllerLogin',
            "method" => 'showPaginaLogin', 'suffix' => '')));
$rotas->add('login', new Route('/login',
        array('_controller' => 'MyPet\Controller\ControllerLogin',
            "method" => 'efetuarLogin', 'suffix' => '')));

// ROTAS PARA PAGINA INICIAL USUARIO LOGADO
$rotas->add('paginainiciall', new Route('/indexl',
        array('_controller' => 'MyPet\Controller\ControllerLogado',
            "method" => 'showPaginaInicialL', 'suffix' => '')));


//$rotas->add('lista', new Route('/listamascotes',
//        array('_controller' => 'MyPet\Controller\ControllerDoacao',
//            "method" => 'listarMascoteDoacao', 'suffix' => '')));




// ROTAS PARA INSERIR DOACAO

$rotas->add('formulariodoacao', new Route('/formdoar',
        array('_controller' => 'MyPet\Controller\ControllerLogado',
            "method" => 'showPaginaDoar', 'suffix' => '')));
$rotas->add('inserirdoacao', new Route('/doar',
        array('_controller' => 'MyPet\Controller\ControllerDoacao',
            "method" => 'cadastrarDoacao', 'suffix' => '')));

// ROTAS MINHAS DOACOES 
$rotas->add('listaminhasdoacoes', new Route('/listaminhasdoacoes',
        array('_controller' => 'MyPet\Controller\ControllerMinhasDoacoes',
            "method" => 'listarMinhasDoacoes', 'suffix' => '')));

$rotas->add('detalhesminhadoacao', new Route('/detalhesminhadoacao/{suffix}',
        array('_controller' => 'MyPet\Controller\ControllerMinhasDoacoes',
            "method" => 'detalhesminhadoacao', 'suffix' => '')));

// DELETANDO DOACOES INSERIDAS
$rotas->add('deletar', new Route('/deletarDoacao',
        array('_controller' => 'MyPet\Controller\ControllerMinhasDoacoes',
            "method" => 'deletDoacao', 'suffix' => '')));
$rotas->add('deletadosucesso', new Route('/deletarSucesso',
        array('_controller' => 'MyPet\Controller\ControllerLogado',
            "method" => 'showSucessoDeletarDoacao', 'suffix' => '')));

$rotas->add('deletadoerro', new Route('/deletarErro',
        array('_controller' => 'MyPet\Controller\ControllerLogado',
            "method" => 'showErroaoDeletarDocao', 'suffix' => '')));

// ROTAS ANIMAIS DISPONIVEIS PARA DOACAO
$rotas->add('listaparaadotar', new Route('/listaparaadotar',
        array('_controller' => 'MyPet\Controller\ControllerDoacao',
            "method" => 'listarMascoteDoacao', 'suffix' => '')));

$rotas->add('detalhemascoteparaadotar', new Route('/detalhemascoteparaadotar/{suffix}',
        array('_controller' => 'MyPet\Controller\ControllerDoacao',
            "method" => 'detalheMascoteParaAdotar', 'suffix' => '')));

// ADOTAR

$rotas->add('adotar', new Route('/gerarPdfDoacao/{suffix}',
        array('_controller' => 'MyPet\Controller\ControllerDoacao',
            "method" => 'gerarPdfDoacao', 'suffix' => '')));

// ROTA PARA DESLOGAR NO SISTEMA
$rotas->add('logout', new Route('/logout',
        array('_controller' => 'MyPet\Controller\ControllerLogin',
            "method" => 'efetuarLogout', 'suffix' => '')));




// LISTA PARA ADOTAR ANIMAIS

return $rotas;