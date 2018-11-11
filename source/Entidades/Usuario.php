<?php
namespace MyPet\Entidades;

class Usuario {
    private $nome;
    private $cpf;
    private $login;
    private $senha;
    private $email;
    private $rua;
    private $numero;
    private $bairro;
    private $cep;
    private $cidade;
    private $estado;

    function __construct($nome, $cpf, $login, $senha, $email, $rua, $numero, $bairro, $cep, $cidade, $estado) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->login = $login;
        $this->senha = $senha;
        $this->email = $email;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->cep = $cep;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }
    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function getEmail() {
        return $this->email;
    }

    function getRua() {
        return $this->rua;
    }

    function getNumero() {
        return $this->numero;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCep() {
        return $this->cep;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}
