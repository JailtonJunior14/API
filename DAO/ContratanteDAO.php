<?php


namespace Api\DAO;

use Api\Model\Contratante;

final class ContratanteDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save( Contratante $model) : Contratante
    {
        return ($model->id == null) ? $this->insert($model) : $this->update($model); 
    }

    public function insert( Contratante $model) : Contratante
    {
        $sql = "INSERT INTO contratante(nome, cpf, telefone) VALUES (?,?,?)";

        $stmt=parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->telefone);
        $stmt->execute();

        $model->id = parent::$conexao->lastInsertId();

        return $model;
    }

    public function select() : array
    {
        $sql = "SELECT * FROM contratante";
        $stmt=parent::$conexao->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\Contratante");
    }

    public function selectById( int $id) : ?Contratante
    {
        $sql = "SELECT * FROM contratante WHERE id=?";
        $stmt=parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("Api\Model\Contratante");
    }

    public function update( Contratante $model) : Contratante
    {
        $sql = "UPDATE SET nome=?, cpf=?, telefone=? WHERE id=?";
        $stmt=parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->id);
        $stmt->execute();

        return $model;
    }

    public function delete(int $id) : bool
    {
        $sql = "DELETE FROM contratante WHERE id=?";
        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $id;
    }
}