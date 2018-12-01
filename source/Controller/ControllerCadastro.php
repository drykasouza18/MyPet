<?php

namespace MyPet\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use MyPet\Util\Sessao;
use MyPet\Entidades\Usuario;
use MyPet\Modelos\ModeloUsuario;

class ControllerCadastro {

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

    public function InserirUsuario() {
        $nome = $this->request->get('nome');
        $cpf = $this->request->get('cpf');
        $identidade = $this->request->get('identidade');
        $email = $this->request->get('email');
        $senha = $this->request->get('senha');
        $rua = $this->request->get('rua');
        $numero = $this->request->get('numero');
        $bairro = $this->request->get('bairro');
        $cep = $this->request->get('cep');
        $cidade = $this->request->get('cidade');
        $estado = $this->request->get('estado');

        if (empty($nome)) {
            echo 'Nome está vazio!';
            return;
        }
        if (empty($cpf)) {
            echo'C.P.F. está vazio!';
            return;
        }
        if (empty($identidade)) {
            echo'Identidade está vazio!';
            return;
        }
        if (empty($senha)) {
            echo 'Senha está vazio!';
            return;
        }
        if (empty($email)) {
            echo 'E-mail está vazio!';
            return;
        }
        if (empty($rua)) {
            echo 'Rua está vazio!';
            return;
        }
        if (empty($numero)) {
            echo 'Número está vazio!';
            return;
        }
        if (empty($bairro)) {
            echo 'Bairro está vazio!';
            return;
        }
        if (empty($cep)) {
            echo 'C.E.P está vazio!';
            return;
        }
        if (empty($cidade)) {
            echo'Cidade está vazio!';
            return;
        }
        if (empty($estado)) {
            echo 'Estado está vazio!';
            return;
        }

        $usuario = new Usuario($nome, $cpf, $identidade, $senha, $email, $rua,
                $numero, $bairro, $cep, $cidade, $estado);
        $modeloUsuario = new ModeloUsuario();
        $quantidade = $modeloUsuario->buscaEmail($email);
 
        if ($quantidade >= 1) {
            echo 'E-mail já cadastrado no sistema.';
            $quantidade = 0;
        } else {
            
            $quantidade = $modeloUsuario->buscaCPF($cpf);
            if ($quantidade >=1){
                echo 'C.P.F. já cadastrado no sistema.';
            }else{
                if ($id = $modeloUsuario->cadastrarUsuario($usuario)) {
                echo 'Cadastro efetuado com sucesso. Código: ' . $id;
            } else {
                echo 'Falha ao cadastrar!';
            }
            }
            
        }
    }

}
