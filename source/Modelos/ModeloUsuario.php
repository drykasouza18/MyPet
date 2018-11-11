<?php

namespace MyPet\Modelos;

use MyPet\Entidades\Usuario;
use MyPet\Util\Conexao;

class ModeloUsuario {

    function __construct() {
        
    }

    public function cadastrarUsuario(Usuario $usuario) {
        try {
            $sql = 'insert into usuario (nome, cpf, login, senha, email, rua, numero,'
                    . 'bairro, cep, cidade, estado) '
                    . 'values(:nome, :cpf, :login, :senha, :email, :rua, :numero,'
                    . ':bairro, :cep, :cidade, :estado)';
            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->bindValue(':nome', $usuario->getNome());
            $p_sql->bindValue(':cpf', $usuario->getCpf());
            $p_sql->bindValue(':login', $usuario->getLogin());
            $p_sql->bindValue(':senha', $usuario->getSenha());
            $p_sql->bindValue(':email', $usuario->getEmail());
            $p_sql->bindValue(':rua', $usuario->getRua());
            $p_sql->bindValue(':numero', $usuario->getNumero());
            $p_sql->bindValue(':bairro', $usuario->getBairro());
            $p_sql->bindValue(':cep', $usuario->getCep());
            $p_sql->bindValue(':cidade', $usuario->getCidade());
            $p_sql->bindValue(':estado', $usuario->getEstado());
            if ($p_sql->execute()) {
                return Conexao::getInstancia()->lastInsertId();
            }
            return null;
        } catch (Exception $ex) {
            return 'deu erro na conexão:' . $ex;
        }
    }

    public function verificarLogin($email, $senha) {
        try {
            $sql = 'select * from usuario '
                    . 'where (email = :email AND senha = :senha)';
            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->bindValue(':email', $email);
            $p_sql->bindValue(':senha', $senha);
            if ($p_sql->execute()) {
                return $count = $p_sql->rowCount();
            }
            return null;
        } catch (Exception $ex) {
            return 'deu erro na conexão:' . $ex;
        }
    }

}
