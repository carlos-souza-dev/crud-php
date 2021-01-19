<?php

namespace App\Http\Controllers;
use DB;

class MoradorController extends Controller
{
    public function index() {
        //  SESSÃO
        session_start();

        if(!isset($_SESSION['logged'])) {
            return view('index');     
        }

        $moradores = DB::select("SELECT m.id, m.nome, m.sobrenome, m.email, m.idade, a.bloco, a.apartamento, m.id_apto FROM morador m INNER JOIN apartamento a WHERE a.id = m.id_apto");
        $classificados = DB::select("SELECT * FROM classificado");
        return view("morador", ['moradores' => $moradores, 'classificados' => $classificados]);
    }

    public function edit() {
        //  SESSÃO
        session_start();

        if(!isset($_SESSION['logged'])) {
            return view('index');     
        }

        if(isset($_GET['id'])){
            $id = $_GET['id'];

        if($_SESSION['id'] == $id) {
        $_SESSION['mensagem'] = "Você não pode editar esse morador.";
            return view('/home');     
        }

            $morador = DB::select("SELECT m.id, m.nome, m.sobrenome, m.email, m.idade,  m.id_apto, a.bloco, a.apartamento FROM morador m INNER JOIN apartamento a WHERE a.id = m.id_apto AND m.id = '$id'");
            return view("morador-editar", ["morador" => $morador]);
        } else {
            $_SESSION['mensagem'] = "Não foi possível editar esse morador.";
            return redirect("/morador");
        }
    }

    public function update() {
        // SESSÃO
        session_start();
        // CONEXÃO
        if(isset($_POST['btn-editar'])){
            $error = [];
            $id = filter_input(INPUT_POST, 'id');
            $id_apto = filter_input(INPUT_POST, 'id_apto');

            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
            $bloco = filter_input(INPUT_POST, 'bloco', FILTER_SANITIZE_SPECIAL_CHARS);
            $apto = filter_input(INPUT_POST, 'apto', FILTER_SANITIZE_SPECIAL_CHARS);
            
            if(!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($idade)) {

                if(!$nome){
                    $error = "O nome é obrigatório.";
                }
                if(!$sobrenome){
                    $error = "O sobrenome é obrigatório.";
                }
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $error = "E-mail inválido";
                }
                if(strlen($email) > 30){
                    $error = "E-mail deve conter no máximo 30 caracteres.";
                }
                if(!filter_var($idade, FILTER_VALIDATE_INT)){
                    $error = "A idade precisa ser um inteiro";
                }
                if(!$bloco){
                    $error = "O bloco é obrigatório.";
                }
                if(!filter_var($apto, FILTER_VALIDATE_INT)){
                    $error = "O apartamento precisa ser um inteiro";
                }
            } else {
                $_SESSION['mensagem'] = "Erro - Preencha todos os campos.";
                $morador = DB::select("SELECT m.id, m.nome, m.sobrenome, m.email, m.idade,  m.id_apto, a.bloco, a.apartamento FROM morador m INNER JOIN apartamento a WHERE a.id = m.id_apto AND m.id = '$id'");
                return view("morador-editar", ['morador' => $morador]);
            }

            if(!$error) {
                $morador = DB::update("UPDATE morador SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id'");
                $apartamento = DB::update("UPDATE apartamento SET bloco = '$bloco', apartamento ='$apto' WHERE id = '$id_apto'");
                $_SESSION['mensagem'] = "Atualizado com com sucesso!";
                return redirect("/home");
            } else {
                $_SESSION['mensagem'] = $error;
                return redirect("/morador/editar");
            }
            
        }   
    }

    public function distroy() {
        // SESSÃO
        // CONEXÃO
        if(isset($_POST['btn-deletar'])){
            $id = filter_input(INPUT_POST, 'id');

            session_start();
            if($_SESSION['id'] == $id){
                session_unset();
                session_destroy();

                $apto = DB::select("SELECT id_apto FROM morador WHERE id = '$id'");
                $apto = $apto[0]->id_apto;
                $morador = DB::delete("DELETE FROM classificado WHERE id_morador = '$id'");
                $morador = DB::delete("DELETE FROM morador WHERE id = '$id'");
                $apartamento = DB::delete("DELETE FROM apartamento WHERE id = $apto");
    
                $_SESSION['mensagem'] = "Deletado com sucesso!";
                return redirect('/');
                if($morador){
                } else {
                    $_SESSION['mensagem'] = "Erro ao deletar.";
                    return redirect('/home');
                }
            } else {
                $_SESSION['mensagem'] = "Erro - Você não pode deletar este morador.";
                return redirect('/home');
            }

        }
    }
}

?>
