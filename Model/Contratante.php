<?php

namespace Api\Model;

use Api\DAO\ContratanteDAO;

final class Contratante
{
    public $id, $nome, $cpf, $telefone;

    function save() : Contratante
    {
        return new ContratanteDAO()->save($this);
    }

    function getById(int $id) : ?Contratante
    {
        return new ContratanteDAO()->selectById($id);
    }

    function getAllRows() : array
    {
        return new ContratanteDAO()->select();
    }

    function delete(int $id) : bool
    {
        return new ContratanteDAO()->delete($id);
    }
}