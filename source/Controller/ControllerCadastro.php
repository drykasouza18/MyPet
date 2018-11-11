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

    public function showPaginaCadastro() {
        return $this->response->setContent($this->twig->render('cadastrarNoSistema.twig'));
    }

    public function InserirUsuario() {
        $nome = $this->request->get('nome');
        $cpf = $this->request->get('cpf');
        $login = $this->request->get('login');
        $senha = $this->request->get('senha');
        $email = $this->request->get('email');
        $rua = $this->request->get('rua');
        $numero = $this->request->get('numero');
        $bairro = $this->request->get('bairro');
        $cep = $this->request->get('cep');
        $cidade = $this->request->get('cidade');
        $estado = $this->request->get('estado');

        if (empty($nome)) {
            echo 'Nome está vazio!';
        } else {
            if (empty($cpf)) {
                echo'C.P.F. está vazio!';
            } else {
                if (empty($login)) {
                    echo'Mensagem está vazio!';
                } else {
                    if (empty($senha)) {
                        echo 'Senha está vazio!';
                    } else {
                        if (empty($email)) {
                            echo 'E-mail está vazio!';
                        } else {
                            if (empty($rua)) {
                                echo 'Rua está vazio!';
                            } else {
                                if (empty($numero)) {
                                    echo 'Número está vazio!';
                                } else {
                                    if (empty($bairro)) {
                                        echo 'Bairro está vazio!';
                                    } else {
                                        if (empty($cep)) {
                                            echo 'C.E.P está vazio!';
                                        } else {
                                            if (empty($cidade)) {
                                                echo'Cidade está vazio!';
                                            } else {
                                                if (empty($estado)) {
                                                    echo 'Estado está vazio!';
                                                } else {
                                                    $usuario = new Usuario($nome, $cpf, $login, $senha, $email, 
                                                            $rua, $numero, $bairro, $cep, $cidade, $estado);
                                                    $modeloUsuario = new ModeloUsuario();
                                                    if ($id = $modeloUsuario>cadastrarContato($usuario)) {
                                                        echo 'Cadastro efetuado com sucesso.Código: ' . $id;
                                                    } else {
                                                        echo 'Falha ao cadastrar..';
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

}
