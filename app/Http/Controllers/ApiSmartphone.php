<?php

namespace App\Http\Controllers;
use App\Models\Smartphone;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Validation\ValidationSmartphone;

class ApiSmartphone extends Controller {

    private $model;

    public function __construct(Smartphone $smartphone){
        $this->model = $smartphone;
    }

    public function list () {        
        
        $smartphones = $this->model->all();

        try{
            if(count($smartphones)){
                return response()->json($smartphones, Response::HTTP_OK);
            } else {
                return response()->json([], Response::HTTP_OK);
            }
        }catch (QueryException $exception){
            return response()->json(['error'=>'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function create(Request $request) {

        $validator = Validator::make(
            $request->all(),
            ValidationSmartphone::RULE_CREATE
        );
        
        if($validator->fails()){
            return response()->json(['error'=>'Erro ao validar os dados, tente novamente.'], Response::HTTP_INTERNAL_SERVER_ERROR);
            
        } else {
            try{
                $smartphone = $this->model->create($request->all());
                return response()->json($smartphone, Response::HTTP_CREATED);
            }catch (QueryException $exception){
                return response()->json(['error'=>'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }        
    }

    public function search ($id) {

        $smartphone = $this->model->find($id);

        try{
            if(isset($smartphone)){
                return response()->json($smartphone, Response::HTTP_OK);
            } else {
                return response()->json(null, Response::HTTP_OK);
            }
        }catch (QueryException $exception){
            return response()->json(['error'=>'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function update(Request $request, $id) {

        $validator = Validator::make(
            $request->all(),
            ValidationSmartphone::RULE_CREATE
        );
        
        if($validator->fails()){
            return response()->json(['error'=>'Erro ao validar os dados, tente novamente.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        } else {
            try{
                $this->model->find($id)
                    ->update($request->all());
                return response()->json(['Success' => 'Dados atualizados com sucesso!'], Response::HTTP_OK);
            }catch (QueryException $exception){
                return response()->json(['error'=>'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    public function delete($id) {

        $smartphone = $this->model->find($id);
        
        try{
            if($smartphone){
                $this->model->find($id)
                ->delete();
                $deletado = [$smartphone, ['Item'=>'Deletado']];
                return response()->json($deletado, Response::HTTP_OK);
            }
        }catch (QueryException $exception){
            return response()->json(['error'=>'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}