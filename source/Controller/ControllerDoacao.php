<?php

namespace MyPet\Controller;

class ControllerDoacao {

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

    

    public function cadastrarDoacao(){
        
    }
}
