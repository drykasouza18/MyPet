<?php

namespace MyPet;

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use MyPet\Util\Sessao;

$sessao = new Sessao();
$sessao->start();

include 'rotas.php';

$request = Request::createFromGlobals();
$contexto = new RequestContext();
$contexto->fromRequest($request);

$response = Response::create();


$matcher = new UrlMatcher($rotas, $contexto);

$loader = new FilesystemLoader(__DIR__ . '/View/');
$environment = new Environment($loader);

try {
    $atributos = $matcher->match($contexto->getPathInfo());
    if (empty($atributos)) {
        echo 'erro';
    } else {
        $controller = $atributos['_controller'];
        $method = $atributos['method'];
        if (isset($atributos['suffix'])) {
            $parametros = $atributos['suffix'];
        } else {
            $parametros = '';
        }
        $obj = new $controller($response, $request, $environment, $sessao);
        $obj->$method($parametros);
    }
} catch (Exception $ex) {
    $response->setContent('Não encontrado: ', Response::HTTP_NOT_FOUND);
}

$response->send();







