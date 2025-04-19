<?php

namespace Api\Controller;

use API\Model\Contratante;


final class ContratanteController {
    public static function listar(){
        //echo "listar";
        $contratante = new Contratante();
        $lista = $contratante->getAllRows();
        //var_dump($lista);
        echo json_encode($lista);
    }


    public static function cadastro(){
        //echo "cadastrar";
        $model = new Contratante();

        $model->nome = "Ja";
        $model->cpf = 55647773456 ;
        $model->telefone = 14999999999;
        $model->save();
    }


    public static function delete(){
        //echo "deletar";

        $model = new Contratante();

        $model->delete((int) $id = 1);
    }

    public static function update(){
        echo "update";
    }
}