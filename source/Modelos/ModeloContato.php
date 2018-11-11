<?php
namespace MyPet\Modelos;

use MyPet\Entidades\Contato;
use MyPet\Util\Conexao;

class ModeloContato {   

    function __construct() {
        
    }
    
    public function cadastrarContato(Contato $contato) {
        try {
            $sql = 'insert into contato (nome, email, mensagem) values(:nome, :email, :mensagem)';
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
