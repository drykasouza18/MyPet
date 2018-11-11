<?php
namespace MyPet\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use MyPet\Util\Sessao;

 class ControllerShowView {
    private $response;
    private $contexto;
    private $twig;
    private $sessao;
    public function __construct(Response $response, Request $contexto, Environment $twig, Sessao $sessao) {
        $this->response = $response;
        $this->contexto = $contexto;
        $this->twig = $twig;
        $this->sessao = $sessao;
    }

    public function showPaginaInicial() {
       return $this->response->setContent($this->twig->render('index.twig'));
    }
    

    public function showPaginaCadastro() {
        return $this->response->setContent($this->twig->render('cadastrarNoSistema.twig'));
    }
    
    public function showPaginaErro(){
       return $this->response->setContent($this->twig->render('erro.twig')); 
    }

}
