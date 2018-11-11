<?php
namespace MyPet\Entidades;

class Contato {
   private $nome;
   private $email;
   private $mensagem;
   function __construct($nome, $email, $mensagem) {
       $this->nome = $nome;
       $this->email = $email;
       $this->mensagem = $mensagem;
   }
   function getNome() {
       return $this->nome;
   }

   function getEmail() {
       return $this->email;
   }

   function getMensagem() {
       return $this->mensagem;
   }

   function setNome($nome) {
       $this->nome = $nome;
   }

   function setEmail($email) {
       $this->email = $email;
   }

   function setMensagem($mensagem) {
       $this->mensagem = $mensagem;
   }


}
