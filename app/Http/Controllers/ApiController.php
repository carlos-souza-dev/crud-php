<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Fornecedor;
use Illuminate\Http\Request;
use DB;

class ApiController extends Controller {

    public function list () {
        
        $fornecedores = DB::select("SELECT * FROM fornecedor");;

        return response()->json($fornecedores); 
    }
}