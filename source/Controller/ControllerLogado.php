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
            return $this->response->setContent($this->twig->render('inserirdoacao.twig'));
        } else {
            $destino = '/formlogin';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }
     public function showSucessoDeletarDoacao() {
        if ($this->sessao->existe('E-mail')) {
            return $this->response->setContent($this->twig->render('sucessoaodeletar.twig'));
        } else {
            $destino = '/formlogin';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }
    public function showErroaoDeletarDocao() {
        if ($this->sessao->existe('E-mail')) {
            return $this->response->setContent($this->twig->render('erroaodeletar.twig'));
        } else {
            $destino = '/formlogin';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }
    public function showPaginaFormularioAdotar() {
        if ($this->sessao->existe('E-mail')) {
            return $this->response->setContent($this->twig->render('formularioparadotar.twig'));
        } else {
            $destino = '/formlogin';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }
   
}
