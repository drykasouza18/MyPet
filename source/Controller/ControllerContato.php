<?php

namespace MyPet\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use MyPet\Util\Sessao;
use MyPet\Entidades\Contato;
use MyPet\Modelos\ModeloContato;

class ControllerContato {

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

    public function showPaginaContato() {
        return $this->response->setContent($this->twig->render('contato.twig'));
    }

    public function InserirContato() {
        $nome = $this->request->get('nome');
        $email = $this->request->get('email');
        $mensagem = $this->request->get('mensagem');

        if (empty($nome)) {
            echo 'Nome está vazio';
        } else {
            if (empty($email)) {
                echo'Email está vazio';
            } else {
                if (empty($mensagem)) {
                    echo'Mensagem está vazio';
                } else {
                    $contato = new Contato($nome, $email, $mensagem);
                    $modeloContato = new ModeloContato(); 
                    if($id = $modeloContato->cadastrarContato($contato)){
                        echo 'Mensagem enviada com sucesso.Código: '. $id;
                    }else{
                        echo 'Erro ao enviar a mensagem.';
                    }
                    
                }
            }
        }
    }

}
