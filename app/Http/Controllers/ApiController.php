<?php

namespace App\Http\Controllers;
use App\Models\Fornecedor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use DB;

class ApiController extends Controller {

    private $model;

    public function __construct(Fornecedor $fornecedor){
        $this->model = $fornecedor;
    }

    public function list () {        
        
        $fornecedores = $this->model->all();

        try{
            if(count($fornecedores)){
                return response()->json($fornecedores, Response::HTTP_OK);
            } else {
                return response()->json([], Response::HTTP_OK);
            }
        }catch (QueryException $exception){
            return response()->json(['error'=>'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function create(Request $request) {

        $validator = Validator::make($request->all(),
            [
                'nome'=>'required | max: 45',
                'cnpj'=>'required | max: 10',
                'email'=>'required|email|unique:fornecedor| max: 30' 
            ]
        );
        
        if($validator->fails()){
            return response()->json(['error'=>'Erro ao validar os dados, tente novamente.'], Response::HTTP_INTERNAL_SERVER_ERROR);
            
        } else {
            try{
                $fornecedor = $this->model->create($request->all());
                return response()->json($fornecedor, Response::HTTP_CREATED);
            }catch (QueryException $exception){
                return response()->json(['error'=>'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }        
    }

    public function search ($id) {

        $fornecedor = $this->model->find($id);
        
        try{
            if(count($fornecedor)){
                return response()->json($fornecedor, Response::HTTP_OK);
            } else {
                return response()->json(null, Response::HTTP_OK);
            }
        }catch (QueryException $exception){
            return response()->json(['error'=>'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request, $id) {

        $validator = Validator::make($request->all(),
            [
                'nome'=>'required | max: 45',
                'cnpj'=>'required | max: 10',
                'email'=>'required|email|unique:fornecedor| max: 30' 
            ]
        );
        
        if($validator->fails()){
            return response()->json(['error'=>'Erro ao validar os dados, tente novamente.'], Response::HTTP_INTERNAL_SERVER_ERROR);
            
        } else {
            try{
                $fornecedor = $this->model->find($id)
                    ->update($request->all());
                return response()->json($fornecedor, Response::HTTP_OK);
            }catch (QueryException $exception){
                return response()->json(['error'=>'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    public function delete($id) {
        $fornecedor = $this->model->find($id)
            ->delete();

        try{
            return response()->json(null, Response::HTTP_OK);
        }catch (QueryException $exception){
            return response()->json(['error'=>'Erro de conexão com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}