<?php

namespace App\Http\Controllers;
use App\Models\Fornecedor;
use Illuminate\Http\Request;
use DB;

class ApiController extends Controller {

    private $model;

    public function __construct(Fornecedor $fornecedor){
        $this->model = $fornecedor;
    }

    public function list () {        
        $fornecedores = $this->model->all();
        return response()->json($fornecedores);
    }

    public function search ($id) {
        $fornecedor = $this->model->find($id);
        return response()->json($fornecedor);
    }

    public function create(Request $request) {
        $fornecedor = $this->model->create($request->all());
        return response()->json($fornecedor);
    }

    public function update(Request $request, $id) {
        $fornecedor = $this->model->find($id)
            ->update($request->all());
        return response()->json($fornecedor);
    }

    public function delete($id) {
        $fornecedor = $this->model->find($id)
            ->delete();
        return response()->json($fornecedor);
    }
}