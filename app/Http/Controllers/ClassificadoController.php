<?php

namespace App\Http\Controllers;
use App\Models\Classificado;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Validation\ClassificadoValidation;

class ClassificadoController extends Controller {

    public function index () {
        $classificados = Classificado::all();

        return $classificados;
    }

    public function register () {
        return ["Registrar"];
    }

    public function store (Request $request) {

        $validation = Validator::make(
            $request->all(),
            ClassificadoValidation::RULE_CREATE
        );

        if($validation->fails()){
            return response()->json(['Error'=>'Não foi possível cadastrar esse classificado.']);
        } else {
            $classificado = Classificado::create($request->all());
            return ['Sucesso', $classificado];
        }

    }

    public function update ($id, Request $request) {

        $validation = Validator::make(
            $request->all(),
            ClassificadoValidation::RULE_CREATE
        );

        if($validation->fails()){
            return response()->json(['Error'=>'Não foi possível atualizar esse classificado.']);
        } else {
            $data = Classificado::find($id);
            $update = Classificado::find($id)->update($request->all());
            $change = array(
                    "Antigos"=>array(
                        "morador_id"=>$data->morador_id, 
                        "titulo_classificadodo"=>$data->titulo_classificado, 
                        "descricao_classificado"=>$data->descricao_classificado,
                    ),
                    "Novos" => array(
                        "morador_id"=>$request->morador_id, 
                        "titulo_classificado"=>$request->titulo_classificado, 
                        "descricao_classificado"=>$request->descricao_classificado, 
                    )
                );
            return json_encode($change);   
        }
    }

    public function distroy ($id) {
        $classificado = Classificado::find($id);
        
        if($classificado){
            Classificado::find($id)->delete();
            return ["Mensagem"=>"Classificado exluído com sucesso."];
        } else {
            return ["Mensagem"=>"Classificado não encontrado."];
        };
    }
    
};

?>