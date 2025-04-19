<?php

namespace Api\DAO;

use Api\Model\Prestador;

final class PrestadorDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function save(Prestador $model) : Prestador
    {
        // if($model->id == null)
        // {
        //     return $this->insert($model);
        // } else{
        //     return $this->update($model);
        // }

        //metodo de resolução escopo
        return ($model->id == null) ? $this->insert($model) : $this->update($model);
    }
    
    public function insert(Prestador $model) : Prestador
    {
        $sql = "INSERT INTO prestador (nome, area, telefone) VALUES (?, ?, ?) ";

        $stmt  = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->area);
        $stmt->bindValue(3, $model->telefone);
        $stmt->execute();

        $model->id = parent::$conexao->lastInsertId();

        //var_dump($model);
        return $model;
    }

    public function update(Prestador $model) : Prestador 
    {
        $sql = "UPDATE prestador SET nome=?, area=?, telefone=? WHERE id=? ";

        $stmt  = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->area);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->id);
        $stmt->execute();
        
        //var_dump($model);
        return $model;
        //var_dump($model);
    }

    public function selectById(int $id) : ?Prestador
    {
        $sql = "SELECT * FROM prestador WHERE id=? ";

        $stmt  = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        
        return $stmt->fetchObject("Api\model\prestador");
        
    }

    public function select() : array
    {
        $sql = "SELECT * FROM prestador ";

        $stmt  = parent::$conexao->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\model\prestador");
    }


    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM prestador WHERE id=? ";

        $stmt  = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        
        return $stmt->execute();
        
        
    }
}