<?php

namespace MyPet\Entidades;

class Doacao {

    private $nome_mascote;
    private $idade;
    private $categoria;
    private $vacinado;
    private $vermifugado;
    private $adocao_especial;
    private $historia;
    private $nome_doador;
    private $email_doador;
    private $telefone_doador;
    private $imagem;

    function __construct($nome_mascote, $idade, $categoria, $vacinado, $vermifugado, $adocao_especial, $historia, $nome_doador, $email_doador, $telefone_doador) {
        $this->nome_mascote = $nome_mascote;
        $this->idade = $idade;
        $this->categoria = $categoria;
        $this->vacinado = $vacinado;
        $this->vermifugado = $vermifugado;
        $this->adocao_especial = $adocao_especial;
        $this->historia = $historia;
        $this->nome_doador = $nome_doador;
        $this->email_doador = $email_doador;
        $this->telefone_doador = $telefone_doador;
    }

    function getNome_mascote() {
        return $this->nome_mascote;
    }

    function setNome_mascote($nome_mascote) {
        $this->nome_mascote = $nome_mascote;
    }

    function getIdade() {
        return $this->idade;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getVacinado() {
        return $this->vacinado;
    }

    function getVermifugado() {
        return $this->vermifugado;
    }

    function getAdocao_especial() {
        return $this->adocao_especial;
    }

    function getHistoria() {
        return $this->historia;
    }

    function getNome_doador() {
        return $this->nome_doador;
    }

    function getEmail_doador() {
        return $this->email_doador;
    }

    function getTelefone_doador() {
        return $this->telefone_doador;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setVacinado($vacinado) {
        $this->vacinado = $vacinado;
    }

    function setVermifugado($vermifugado) {
        $this->vermifugado = $vermifugado;
    }

    function setAdocao_especial($adocao_especial) {
        $this->adocao_especial = $adocao_especial;
    }

    function setHistoria($historia) {
        $this->historia = $historia;
    }

    function setNome_doador($nome_doador) {
        $this->nome_doador = $nome_doador;
    }

    function setEmail_doador($email_doador) {
        $this->email_doador = $email_doador;
    }

    function setTelefone_doador($telefone_doador) {
        $this->telefone_doador = $telefone_doador;
    }

}
