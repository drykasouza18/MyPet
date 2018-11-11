<?php
namespace MyPet\Util;

class Sessao {

    function __construct() {
        
    }

    function start() {
        return session_start();
    }

    function add($chave, $valor) {
        $_SESSION['mypet'][$chave] = $valor;
    }

    function get($chave) {
        if (isset($_SESSION['mypet'][$chave]))
            return $_SESSION['mypet'][$chave];
        return '';
    }

    function rem($chave) {
        if (isset($_SESSION['mypet'][$chave]))
            session_unset($_SESSION['mypet'][$chave]);
    }

    function del() {
        if (isset($_SESSION['mypet']))
            session_unset($_SESSION['mypet']);
        session_destroy();
    }

    function existe($chave) {
        if (isset($_SESSION['mypet'][$chave]))
            return true;
        return false;
    }

}
