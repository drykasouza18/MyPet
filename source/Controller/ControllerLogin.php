<?php

namespace MyPet\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use MyPet\Util\Sessao;

class ControllerLogin {

    private $response;
    private $request;
    private $twig;
    private $sessao;

    function __construct($response, $request, $twig, $sessao) {
        $this->response = $response;
        $this->request = $request;
        $this->twig = $twig;
        $this->sessao = $sessao;
    }

    public function showPaginaLogin() {
        return $this->response->setContent($this->twig->render('login.twig'));
    }

    public function efetuarLogin() {

        $login = $this->request->get('login');
        $senha = $this->request->get('senha');
        if(empty($login)){            
            echo 'Login está vazio!';
        }else{
            if(empty($senha)){
                echo 'Senha está vazio!';
            }else{
                echo 'vamos efetuar login';
            }
                
        }
    }

}
