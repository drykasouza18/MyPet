<?php

namespace MyPet\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Twig\Environment;
use MyPet\Util\Sessao;
use MyPet\Modelos\ModeloDoacao;
use MyPet\Entidades\Doacao;
use MyPet\Modelos\ModeloUsuario;

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

    public function cadastrarDoacao() {
        //Informações Animal
        $nomeanimal = $this->request->get('nomeanimal');
        $categoria = $this->request->get('categoria');
        $idade = $this->request->get('idade');
        $sexo = $this->request->get('sexo');
        $raca = $this->request->get('raca');
        $corpelagem = $this->request->get('corpelagem');
        $porte = $this->request->get('porte');
        $castrado = $this->request->get('castrado');
        $vacinado = $this->request->get('vacinado');
        $vermifugado = $this->request->get('vermifugado');
        $adocao_especial = $this->request->get('adocaoespecial');
        $historia = $this->request->get('historia');
        // Informações do Doador 
        $nomedoador = $this->request->get('nomedoador');
        $emaildoador = $this->request->get('emaildoador');
        $telefonedoador = $this->request->get('telefonedoador');
        $imagem = $this->request->files->get('imagem');



        if (empty($nomeanimal)) {
            echo 'Nome do Animal está vazio!';
            return;
        }
        if (empty($categoria)) {
            echo 'Categoria está vazio!';
            return;
        }
        if (empty($idade)) {
            echo 'Idade está vazio!';
            return;
        }
        if (empty($sexo)) {
            echo 'Sexo do Animal está vazio!';
            return;
        }
        if (empty($raca)) {
            echo 'Raça está vazio!';
            return;
        }
        if (empty($corpelagem)) {
            echo 'Cor Pelagem está vazio!';
            return;
        }
        if (empty($porte)) {
            echo 'Porte está vazio!';
            return;
        }
        if (empty($castrado)) {
            echo 'Castrado está vazio!';
            return;
        }
        if (empty($vacinado)) {
            echo 'Vacinado está vazio!';
            return;
        }
        if (empty($vermifugado)) {
            echo 'Vermifugado';
            return;
        }
        if (empty($adocao_especial)) {
            echo'Adoção Especial está vazio!';
            return;
        }
        if (empty($historia)) {
            echo 'História está vazio!';
            return;
        }
        if (empty($nomedoador)) {
            echo 'Nome do Doador está vazio!';
            return;
        }
        if (empty($emaildoador)) {
            echo 'E-mail está vazio!';
            return;
        }
        if (empty($telefonedoador)) {
            echo 'Telefone do doador está vazio!';
            return;
        }
        if (empty($imagem)) {
            echo 'Imagem está vazio!';
            return;
        } else if ($imagem->getSize() > 2000000) {
            echo '<br>Imagem muito grande';
        }


        $doarmascote = new Doacao($nomeanimal, $categoria, $idade, $sexo, $raca, $corpelagem, $porte, $castrado, $vacinado, $vermifugado, $adocao_especial, $historia, $nomedoador, $emaildoador, $telefonedoador);
        $modelodoarmascote = new ModeloDoacao();
        $modeloUsuario = new ModeloUsuario();
        $id = $modeloUsuario->buscaID($this->sessao->get('E-mail'));
        $idUser = $id[0];
        if ($id = $modelodoarmascote->cadastrarDoacao($doarmascote, $idUser)) {
            $diretorio = 'imagens/' . $id . '.jpg';
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio)) {
                echo 'Mascote para doação inserida com sucesso.';
            }
        } else {
            echo 'Erro ao enviar ao inserir doação.';
        }
    }

    public function listarMascoteDoacao() {
        if ($this->sessao->existe('E-mail')) {

            $modelomascote = new ModeloDoacao();
            $modeloUsuario = new ModeloUsuario();

            $email = $this->sessao->get('E-mail');
            $idUsuarioAtual = $modeloUsuario->buscaIDListagem($email);


            $dados = $modelomascote->listarMascotesDoacao($idUsuarioAtual);

            if (empty($dados)) {
                return $this->response->setContent($this->twig->render('listaparaadotarvazia.twig'));
            } else {
                return $this->response->setContent($this->twig->render('listaparaadotar.twig', ['dados' => $dados]));
            }
        } else {
            $destino = '/formlogin';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }

    public function detalheMascoteParaAdotar($id) {
        if ($this->sessao->existe('E-mail')) {
            $modelomascote = new ModeloDoacao();
            $dados = $modelomascote->listaDetalheMascote($id);
            return $this->response->setContent($this->twig->render('detalhemascote.twig', ['dados' => $dados]));
        } else {
            $destino = '/formlogin';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }

    public function gerarPdfDoacao() {
        
    }

}
