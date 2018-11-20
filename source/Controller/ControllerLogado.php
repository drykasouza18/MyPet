<?php
namespace MyPet\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Twig\Environment;
use MyPet\Util\Sessao;

class ControllerLogado {

    private $response;
    private $request;
    private $twig;
    private $sessao;

    function __construct(Response $response, Request $request, Environment $twig, Sessao $sessao) {
        $this->response = $response;
        $this->request = $request;
        $this->twig = $twig;
        $this->sessao = $sessao;
    }

    
    public function showPaginaListaAdotar() {
        if ($this->sessao->existe('E-mail')) {
            return $this->response->setContent($this->twig->render('listaparaadotar.twig'));
        } else {
            $destino = '/formlogin';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }

    public function showPaginaInicialL() {
        if ($this->sessao->existe('E-mail')) {
            return $this->response->setContent($this->twig->render('indexlogado.twig'));
        } else {
            $destino = '/formlogin';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }
    public function showPaginaDoar() {
        if ($this->sessao->existe('E-mail')) {
            return $this->response->setContent($this->twig->render('formularioparadoar.twig'));
        } else {
            $destino = '/formlogin';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }
}
