<?php

namespace MyPet\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use MyPet\Util\Sessao;
use MyPet\Modelos\ModeloDoacao;
use MyPet\Entidades\Doacao;

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
        $nome_mascote = $this->request->get('nome_mascote');
        $idade = $this->request->get('idade');
        $categoria = $this->request->get('categoria');
        $vacinado = $this->request->get('vacinado');
        $vermifugado = $this->request->get('vermifugado');
        $adocao_especial = $this->request->get('adocaoespecial');
        $historia = $this->request->get('historia');
        $nomedoador = $this->request->get('nomedoador');
        $emaildoador = $this->request->get('emaildoador');
        $telefonedoador = $this->request->get('telefonedoador');
        $imagem = $this->request->files->get('imagem');

        if ($imagem->getSize() > 2000000) {
            echo '<br>Imagem muito grande';
        }
        if (empty($idade)) {
            echo 'Idade está vazio!';
            return;
        }

        if (empty($categoria)) {
            echo 'Categoria está vazio!';
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
        }

        $doarmascote = new Doacao($nome_mascote, $idade, $categoria, 
                $vacinado, $vermifugado, $adocao_especial, $historia, $nomedoador,
                $emaildoador, $telefonedoador);
        $modelodoarmascote = new ModeloDoacao();

        if ($id = $modelodoarmascote->cadastrarDoacao($doarmascote)) {
            $nome_imagem = $_FILES['imagem']['name'];
            $diretorio = 'imagens/' . $id . '.jpg';
            print_r($diretorio);
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio)) {
                echo 'Mascote para doação inserida com sucesso. Código: ' . $id;
            }
        } else {
            echo 'Erro ao enviar ao inserir doação.';
        }
    }
    public function listarMascoteDoacao(){
        $modelomascote = new ModeloDoacao();
        $dados = $modelomascote->listarMascotesDoacao();
        return $this->response->setContent($this->twig->render('listaparaadotar.twig', ['dados' => $dados]));
    }

}
