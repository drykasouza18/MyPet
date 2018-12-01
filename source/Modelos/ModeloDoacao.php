<?php

namespace MyPet\Modelos;

use MyPet\Entidades\Doacao;
use MyPet\Util\Conexao;
use PDO;

class ModeloDoacao {

    function __construct() {
        
    }

    public function cadastrarDoacao(Doacao $doacao, $id) {
        try {
            $sql = 'INSERT INTO doacao (nomeanimal, categoria, idade, sexo, raca, corpelagem,
               porte, castrado, vacinado, vermifugado, adocao_especial, historia,
               nome_doador, email_doador,telefone_doador, status, id)
               VALUES ( :nomeanimal, :categoria, :idade, :sexo, :raca, :corpelagem,
               :porte, :castrado, :vacinado, :vermifugado, :adocao_especial, :historia,
               :nome_doador, :email_doador,:telefone_doador, :status, :id)';

            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->bindValue(':nomeanimal', $doacao->getNomeanimal());
            $p_sql->bindValue(':categoria', $doacao->getCategoria());
            $p_sql->bindValue(':idade', $doacao->getIdade());
            $p_sql->bindValue(':sexo', $doacao->getSexo());
            $p_sql->bindValue(':raca', $doacao->getRaca());
            $p_sql->bindValue(':corpelagem', $doacao->getCorpelagem());
            $p_sql->bindValue(':porte', $doacao->getPorte());
            $p_sql->bindValue(':castrado', $doacao->getCastrado());
            $p_sql->bindValue(':vacinado', $doacao->getVacinado());
            $p_sql->bindValue(':vermifugado', $doacao->getVermifugado());
            $p_sql->bindValue(':adocao_especial', $doacao->getAdocao_especial());
            $p_sql->bindValue(':historia', $doacao->getHistoria());
            $p_sql->bindValue(':nome_doador', $doacao->getNomedoador());
            $p_sql->bindValue(':email_doador', $doacao->getEmaildoador());
            $p_sql->bindValue(':telefone_doador', $doacao->getTelefonedoador());
            $p_sql->bindValue(':status', 1);
            $p_sql->bindValue(':id', $id);
            if ($p_sql->execute()) {
                return Conexao::getInstancia()->lastInsertId();
            }
            return null;
        } catch (Exception $ex) {
            return 'Erro na Conexão:' . $ex;
        }
    }

    public function listarMascotesDoacao($id) {
        try {
            $idUser = $id[0];
            $sql = 'SELECT * FROM doacao WHERE id <> :id AND status = 1'
                    . '';
            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->bindValue(':id', $idUser);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            return 'Erro na Conexão:' . $ex;
        }
    }

    public function listaDetalheMascote($idDoacao) {
        try {
            $sql = 'SELECT * FROM doacao WHERE idDoacao = :idDoacao AND status =1';
            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->bindValue(':idDoacao', $idDoacao);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            return 'Erro na Conexão:' . $ex;
        }
    }
        public function listarMascotesAdicionadosPeloUsuario($id) {
        try {
            $idUser = $id[0];
            $sql = 'SELECT * FROM doacao WHERE id = :id AND status =1';
            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->bindValue(':id', $idUser);
            $p_sql->execute();
            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            return 'Erro na Conexão:' . $ex;
        }
    }
    
    public function deletarDoacao($id){
        try {
            $idUser = $id[0];
            print_r($idUser);
            $sql = 'UPDATE doacao SET status = 0 WHERE idDoacao = :id';
            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->bindValue(':id', $id);
            $p_sql->execute();
            return 1;
        } catch (Exception $ex) {
            return 'Erro na Conexão:' . $ex;
        }
    }

}
