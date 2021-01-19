<?php

namespace App\Http\Controllers;
use App\Models\Classificado;
use App\Models\Morador;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Validation\ClassificadoValidation;

class ClassificadoController extends Controller {

    public function index () {

        $classificados = Classificado::all();
        return view('classificados', ['classificados' => $classificados]);

    }

    public function register () {
        return view('classificado-add');
    }

    public function store (Request $request) {
        // SESSÃO
        session_start();

        // VALIDAÇÃO
        $validation = Validator::make(
            $request->all(),
            ClassificadoValidation::RULE_CREATE
        );

        if($validation->fails()){
            $_SESSION['mensagem'] = "Não foi possível cadastrar esse classificado.";
            return redirect('/classificado');
        } else {

            $morador = Morador::find($request->id_morador);
            
            if(isset($morador)){

                $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
                $classificado = Classificado::create($request->all());
                return redirect('/classificado');

            } else {

                $_SESSION['mensagem'] = "Este morador não existe!";
                return redirect("/classificado/adicionar");
            }
        }
    }

    public function edit ($id) {

        $classificado = Classificado::find($id);
        return view('classificado-editar', ['classificado' => $classificado]);

    }

    public function update ($id, Request $request) {
        // SESSÃO
        session_start();

        // VALIDAÇÃO
        $validation = Validator::make(
            $request->all(),
            ClassificadoValidation::RULE_CREATE
        );

        if($validation->fails()){

            $_SESSION['mensagem'] = "Não foi possível atualizar esse classificado.";
            return redirect('/morador');

        } else {

            $morador = Morador::find($request->id_morador);
            
            if(isset($morador)){

                $_SESSION['mensagem'] = 'Classificado atualizado com sucesso!';
                $update = Classificado::find($id)->update($request->all());
                return redirect('/morador');

            } else {

                $_SESSION['mensagem'] = "O morador $request->id_morador não existe!";
                return redirect("/classificado/editar/$id");

            }   
        }
    }

    public function distroy ($id) {
        // SESSÃO
        session_start();
        $classificado = Classificado::find($id);
        
        if($classificado){
            Classificado::find($id)->delete();
            $_SESSION["mensagem"] = "Classificado excluído com sucesso!";
            return redirect('/classificado');
        } else {
            $_SESSION["mensagem"] = "Classificado não encontrado!";
            return redirect('/classificado');
        };
    }    
};

?>