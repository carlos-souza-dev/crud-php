<?php

namespace App\Http\Controllers;
use App\Models\Notebook;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Validation\ValidationNotebook;

class ApiNotebook extends Controller {

    private $model;

    public function __construct(Notebook $notebook){
        $this->model = $notebook;
    }

    public function list () {        
        
        $notebooks = $this->model->all();

        try{
            if(count($notebooks)){
                return response()->json($notebooks, Response::HTTP_OK);
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
            ValidationNotebook::RULE_CREATE
        );
        
        if($validator->fails()){
            return response()->json(['error'=>'Erro ao validar os dados, tente novamente.'], Response::HTTP_INTERNAL_SERVER_ERROR);
            
        } else {
            try{
                $notebook = $this->model->create($request->all());
                return response()->json($notebook, Response::HTTP_CREATED);
            }catch (QueryException $exception){
                return response()->json(['error'=>'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }        
    }

    public function search ($id) {

        $notebook = $this->model->find($id);

        try{
            if(isset($notebook)){
                return response()->json($notebook, Response::HTTP_OK);
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
            ValidationNotebook::RULE_CREATE
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

        $notebook = $this->model->find($id);
        
        try{
            if($notebook){
                $this->model->find($id)
                ->delete();
                $deletado = [$notebook, ['Item'=>'Deletado']];
                return response()->json($deletado, Response::HTTP_OK);
            }
        }catch (QueryException $exception){
            return response()->json(['error'=>'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}