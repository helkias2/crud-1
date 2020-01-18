<?php

namespace Model\App;

class ProdutoDao {

    public function create(Produto $p){
        // $sq = "INSERT INTO tbprodutos set nome=:nome, descricao=:descricao";
        // $sq = Conn::getConn()->prepare($sq);
        // $sq->bindValue(':nome', $p->getNome());
        // $sq->bindValue(':descricao', $p->getDescricao());
        // $sq->execute();

        $sql = "INSERT INTO tbprodutos (nome, descricao) VALUE (?,?)";
        $stmt = Conn::getConn()->prepare($sql);
        $stmt->bindValue(1, $p->getNome());
        $stmt->bindValue(2, $p->getDescricao());
        $stmt->execute();

    }
    public function read(){
        $sql = "SELECT * FROM tbprodutos";

        $stmt = Conn::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }else{
            return [];
        }
    }
    public function update(Produto $id){
        $sql = "UPDATE tbprodutos set nome = ?, descricao = ? WHERE id = ?";
        $stmt = Conn::getConn()->prepare($sql);
      
        $stmt->bindValue(1, $id->getNome());
        $stmt->bindValue(2, $id->getDescricao());
        $stmt->bindValue(3, $id->getId());
        $stmt->execute();
    }

    public function delete(Produto $id){
        $sql = "DELETE FROM tbprodutos WHERE id = ?";
        $stmt = Conn::getConn()->prepare($sql);
        $stmt->bindValue(1,$id->getId());
        $stmt->execute();
    }
}