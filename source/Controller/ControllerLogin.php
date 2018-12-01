<?php

namespace MyPet\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Twig\Environment;
use MyPet\Util\Sessao;
use MyPet\Modelos\ModeloUsuario;

class ControllerLogin {

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

    public function showPaginaLogin() {
        return $this->response->setContent($this->twig->render('login.twig'));
    }

    public function efetuarLogin() {
        $sessao = new Sessao();
        $email = $this->request->get('email');
        $senha = $this->request->get('senha');
        if (empty($email)) {
            echo 'E-mail está vazio!';
        } else {
            if (empty($senha)) {
                echo 'Senha está vazio!';
            } else {
                $modeloUsuario = new ModeloUsuario();
                $contador = $modeloUsuario->verificarLogin($email, $senha);
                echo $contador;
                if ($contador >= 1) {
                    $this->sessao->start();
                    $this->sessao->add('E-mail', $email);

                    ?>
                    <script language= "JavaScript">
                        location.href = "http://www.mypet.org/indexl"
                    </script>
                    <?php

                } else {
                    echo 'Falha ao logar..';
                }
            }
        }
    }

    public function efetuarLogout() {
        $this->sessao->del();
        if (!($this->sessao->existe('E-mail'))) {
            ?>
            <script language= "JavaScript">
                location.href = "http://www.mypet.org/formlogin"
            </script>
            <?php

        }
    }

}
