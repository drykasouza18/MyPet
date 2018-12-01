<?php

namespace MyPet\Entidades;

class Doacao {

private $nomeanimal;
private $categoria;
private $idade;
private $sexo;
private $raca;
private $corpelagem;
private $porte;
private $castrado;
private $vacinado;
private $vermifugado;
private $adocao_especial;
private $historia;
private $nomedoador;
private $emaildoador;
private $telefonedoador;

function __construct($nomeanimal, $categoria, $idade, $sexo, $raca, $corpelagem, $porte, $castrado, $vacinado, $vermifugado, $adocao_especial, $historia, $nomedoador, $emaildoador, $telefonedoador) {
    $this->nomeanimal = $nomeanimal;
    $this->categoria = $categoria;
    $this->idade = $idade;
    $this->sexo = $sexo;
    $this->raca = $raca;
    $this->corpelagem = $corpelagem;
    $this->porte = $porte;
    $this->castrado = $castrado;
    $this->vacinado = $vacinado;
    $this->vermifugado = $vermifugado;
    $this->adocao_especial = $adocao_especial;
    $this->historia = $historia;
    $this->nomedoador = $nomedoador;
    $this->emaildoador = $emaildoador;
    $this->telefonedoador = $telefonedoador;
}
function getNomeanimal() {
    return $this->nomeanimal;
}

function getCategoria() {
    return $this->categoria;
}

function getIdade() {
    return $this->idade;
}

function getSexo() {
    return $this->sexo;
}

function getRaca() {
    return $this->raca;
}

function getCorpelagem() {
    return $this->corpelagem;
}

function getPorte() {
    return $this->porte;
}

function getCastrado() {
    return $this->castrado;
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

function getNomedoador() {
    return $this->nomedoador;
}

function getEmaildoador() {
    return $this->emaildoador;
}

function getTelefonedoador() {
    return $this->telefonedoador;
}

function setNomeanimal($nomeanimal) {
    $this->nomeanimal = $nomeanimal;
}

function setCategoria($categoria) {
    $this->categoria = $categoria;
}

function setIdade($idade) {
    $this->idade = $idade;
}

function setSexo($sexo) {
    $this->sexo = $sexo;
}

function setRaca($raca) {
    $this->raca = $raca;
}

function setCorpelagem($corpelagem) {
    $this->corpelagem = $corpelagem;
}

function setPorte($porte) {
    $this->porte = $porte;
}

function setCastrado($castrado) {
    $this->castrado = $castrado;
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

function setNomedoador($nomedoador) {
    $this->nomedoador = $nomedoador;
}

function setEmaildoador($emaildoador) {
    $this->emaildoador = $emaildoador;
}

function setTelefonedoador($telefonedoador) {
    $this->telefonedoador = $telefonedoador;
}


}
