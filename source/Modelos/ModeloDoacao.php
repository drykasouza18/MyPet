<?php

namespace MyPet\Modelos;

use MyPet\Entidades\Doacao;
use MyPet\Util\Conexao;

class ModeloDoacao {

    function __construct() {
        
    }

    public function cadastrarDoacao(Doacao $doacao) {
        try {
            $sql = 'INSERT INTO doar (nome_mascote,idade, categoria, vacinado, vermifugado,
                                                        adocao_especial, historia,
                                                        nome_doador, email_doador, 
                                                        telefone_doador) 
                                                        VALUES(:nome_mascote,:idade, :categoria, :vacinado, 
                                                        :vermifugado,  :adocao_especial                                                    :adocao_especial, :historia,
                                                        :nome_doador, :email_doador, 
                                                        :telefone_doador)';
            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->bindValue(':nome_mascote', $doacao->getNome_mascote());
            $p_sql->bindValue(':idade', $doacao->getIdade());
            $p_sql->bindValue(':categoria', $doacao->getCategoria());
            $p_sql->bindValue(':vacinado', $doacao->getVacinado());
            $p_sql->bindValue(':vermifugado', $doacao->getVermifugado());
            $p_sql->bindValue(':adocao_especial', $doacao->getAdocao_especial());
            $p_sql->bindValue(':historia', $doacao->getHistoria());
            $p_sql->bindValue(':nome_doador', $doacao->getNome_doador());
            $p_sql->bindValue(':email_doador', $doacao->getEmail_doador());
            $p_sql->bindValue(':telefone_doador', $doacao->getTelefone_doador());            
            if ($p_sql->execute()) {
                return Conexao::getInstancia()->lastInsertId();
            }
            return null;
        } catch (Exception $ex) {
            return 'Erro na Conexão:' . $ex;
        }
    }
   public function listarMascotesDoacao(){
       try {
            $sql = 'SELECT * FROM doar';
            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            return 'Erro na Conexão:' . $ex;
        }
   }
   
}
