<?php

namespace MyPet\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use MyPet\Util\Sessao;
use MyPet\Modelos\ModeloDoacao;
use MyPet\Modelos\ModeloUsuario;

class ControllerMinhasDoacoes {

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

    public function listarMinhasDoacoes() {
        if ($this->sessao->existe('E-mail')) {

            $modelomascote = new ModeloDoacao();
            $modeloUsuario = new ModeloUsuario();

            $email = $this->sessao->get('E-mail');
            $idUsuarioAtual = $modeloUsuario->buscaIDListagem($email);


            $dados = $modelomascote->listarMascotesAdicionadosPeloUsuario($idUsuarioAtual);

            if (empty($dados)) {
                return $this->response->setContent($this->twig->render('listadoacaovazia.twig'));
            } else {
                return $this->response->setContent($this->twig->render('doacoesinseridaspelousuario.twig', ['dados' => $dados]));
            }
        } else {
            $destino = '/formlogin';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }

    public function detalhesminhadoacao($id) {
        if ($this->sessao->existe('E-mail')) {
            $modelomascote = new ModeloDoacao();
            $dados = $modelomascote->listaDetalheMascote($id);
            return $this->response->setContent($this->twig->render('detalhemascoteminhasdoacoes.twig', ['dados' => $dados]));
        } else {
            $destino = '/formlogin';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
        $this->request->get('idDoacao');
    }

    public function deletDoacao($id) {
        $idDoacao = $this->request->get('idDoacao');
        $modelomascote = new ModeloDoacao();
        $retorno = $modelomascote->deletarDoacao($idDoacao);
        if ($retorno == 1) {
            ?>
            <script language= "JavaScript">
                location.href = "http://www.mypet.org/deletarSucesso"
            </script>
            <?php

        } else {
            ?>
            <script language= "JavaScript">
                location.href = "http://www.mypet.org/deletarErro"
            </script>
            <?php

        }
    }

}
