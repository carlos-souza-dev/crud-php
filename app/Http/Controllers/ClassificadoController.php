<?php

namespace App\Http\Controllers;
use App\Models\Morador;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Validation\ClassificadoValidation;

class ClassificadoController extends Controller {

    public function index () {
        $moradores = Morador::all();

        return $moradores;
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
            return response()->json(['Error'=>'Não foi possível cadastrar esse morador.']);
        } else {
            $morador = Morador::create($request->all());
            return ['Sucesso', $morador];
        }

    }

    public function update ($id, Request $request) {

        $validation = Validator::make(
            $request->all(),
            ClassificadoValidation::RULE_CREATE
        );

        if($validation->fails()){
            return response()->json(['Error'=>'Não foi possível atualizar esse morador.']);
        } else {
            $data = Morador::find($id);
            $update = Morador::find($id)->update($request->all());
            $change = array(
                    "Antigos"=>array(
                        "nome"=>$data->nome, 
                        "sobrenome"=>$data->sobrenome, 
                        "email"=>$data->email, 
                        "idade"=>$data->idade
                    ),
                    "Novos" => array(
                        "nome"=>$request->nome, 
                        "sobrenome"=>$request->sobrenome, 
                        "email"=>$request->email, 
                        "idade"=>$request->idade
                    )
                );
            return json_encode($change);   
        }
    }

    public function distroy ($id) {
        $morador = Morador::find($id);
        
        if($morador){
            Morador::find($id)->delete();
            return ["Mensagem"=>"Morador exluído com sucesso."];
        } else {
            return ["Mensagem"=>"Morador não encontrado."];
        };
    }
    
};

?>