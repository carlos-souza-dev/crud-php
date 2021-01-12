<?php

namespace App\Http\Controllers;
use DB;

class ClienteController extends Controller
{
    public function index() {

        $query = DB::select("SELECT * FROM clientes");

        return view("index", ['clientes' => $query]);
    }

    public function store() {

        // SESSÃO
        session_start();
        // INSERT
        if(isset($_POST['btn-cadastrar'])){
            $error = [];
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            if(!$nome){
                $error = "O nome é obrigatório.";
            }
            $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_SPECIAL_CHARS);
            if(!$sobrenome){
                $error = "O sobrenome é obrigatório.";
            }
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error = "E-mail inválido";
            }
            if(strlen($email) > 30){
                $error = "E-mail deve conter no máximo 20 caracteres.";
            }
            $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
            if(!filter_var($idade, FILTER_VALIDATE_INT)){
                $error = "A idade precisa ser um inteiro";
            }

            if(!$error) {
                DB::insert("INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')");
                $_SESSION['mensagem'] = 'Cadastro realizado com sucesso!';
                return redirect("/");
            } else {
                $_SESSION['mensagem'] = $error;
                return redirect("/");
            }
            
        }
    }

    public function register() {
        return view("adicionar");
    }

    public function edit() {
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $query = DB::select("SELECT * FROM clientes WHERE id = '$id'");
            return view("editar", ["cliente" => $query]);
        } else {
            $_SESSION['mensagem'] = "Não foi possível editar esse cliente.";
            return redirect("/");
        }
    }

    public function update() {
        // SESSÃO
        session_start();
        // CONEXÃO
        if(isset($_POST['btn-editar'])){
            $error = [];
            $id = filter_input(INPUT_POST, 'id');

            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
            
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
            } else {
                $_SESSION['mensagem'] = "Preencha todos os campos.";
                return redirect("/");
            }

            if(!$error) {
                $query = DB::update("UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id'");
                $_SESSION['mensagem'] = "Atualizado com com sucesso!";
                return redirect("/");
            } else {
                $_SESSION['mensagem'] = $error;
                return redirect("/");
            }
            
        }   
    }

    public function distroy() {
        // SESSÃO
        session_start();
        // CONEXÃO
        if(isset($_POST['btn-deletar'])){
            $id = filter_input(INPUT_POST, 'id');

            $delete = DB::delete("DELETE FROM clientes WHERE id = '$id'");

            if($delete){
                $_SESSION['mensagem'] = "Deletado com com sucesso!";
                return redirect('/');
            } else {
                $_SESSION['mensagem'] = "Erro ao deletar.";
                return redirect('/');
            }
        }
    }
}

?>
