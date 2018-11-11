<?php
namespace MyPet\Modelos;

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
            $p_sql->bindValue(':nome', $contato->getNome());
            $p_sql->bindValue(':email', $contato->getEmail());
            $p_sql->bindValue(':mensagem', $contato->getMensagem());
            if ($p_sql->execute()) {
                return Conexao::getInstancia()->lastInsertId();
            }
            return null;
        } catch (Exception $ex) {
            return 'deu erro na conexão:' . $ex;
        }
    }
}
