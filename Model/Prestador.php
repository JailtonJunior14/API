<?php
namespace Api\Model;

use Api\DAO\PrestadorDAO;

final class Prestador {
    public $id, $nome, $area, $telefone;


    function save() : Prestador
    {
        return (new PrestadorDAO())->save($this);
    }

    function getById(int $id) : ?Prestador
    {
        return (new PrestadorDAO())->selectById($id);
    }

    function getAllRows() : array
    {
        return (new PrestadorDAO())->select();
    }

    function delete(int $id) : bool
    {
        return (new PrestadorDAO())->delete($id);
    }
}