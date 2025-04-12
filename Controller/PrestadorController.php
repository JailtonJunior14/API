<?php

namespace Api\Controller;

use API\Model\Prestador;
use Exception;
use Prestador as GlobalPrestador;

final class PrestadorController
{

    public static function cadastro() : void
    {
        // echo "cadastrar";
        // echo "<hr />";

        $model = new Prestador();
        //$model->id = 3;
        $model->nome = "Ju";
        $model->area = "TI";
        $model->telefone = 14999999999;
        $model->save();
        echo "aluno inserido";
    }

    public static function listar() : void
    {
        echo "listar";
        $prestador = new Prestador();
        $lista = $prestador->getAllRows();
        var_dump($lista);
    }

    public static function delete()
    {
        echo "deletar";
    }

    public static function update()
    {
        echo "uodate";
    }
}
