<?php

namespace App\Http\Controllers;

use DB;

class HomeController extends Controller
{
    public function index() {

        $result = DB::select("SELECT * FROM clientes");

        return view("index", ['clientes' => $result]);
    }

    public function store() {

        // SESSÃO
        // session_start();
        // CONEXÃO
        require_once __DIR__.'/../../../resources/views/php_action/db_connect.php';

        if(isset($_POST['btn-cadastrar'])){
            $nome = mysqli_escape_string($connect, $_POST['nome']);
            $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
            $email = mysqli_escape_string($connect, $_POST['email']);
            $idade = mysqli_escape_string($connect, $_POST['idade']);

            $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";

            if(mysqli_query($connect, $sql)){
                return view("index", ['mensagem'=>'Cadastro realizado com sucesso!']);
            } else {
                return view("index", ['mensagem'=>'Erro ao cadastrar!']);
            }
            
        }
    }

    public function register() {
        return view("adicionar");
    }

    public function edit() {
        return view("editar");
    }

    public function update() {
        // SESSÃO
        session_start();
        // CONEXÃO
        require_once __DIR__.'/../../../resources/views/php_action/db_connect.php';

        if(isset($_POST['btn-editar'])){
            $id = mysqli_escape_string($connect, $_POST['id']);
            $nome = mysqli_escape_string($connect, $_POST['nome']);
            $sobrenome = mysqli_escape_string($connect, $_POST['sobrenome']);
            $email = mysqli_escape_string($connect, $_POST['email']);
            $idade = mysqli_escape_string($connect, $_POST['idade']);

            $sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id'";

            if(mysqli_query($connect, $sql)){
                $_SESSION['mensagem'] = "Atualizado com com sucesso!";
                return redirect('/');
            } else {
                $_SESSION['mensagem'] = "Erro ao atualizar";
                return redirect('/');
            }
        }
    }

    public function distroy() {
        // SESSÃO
        session_start();
        // CONEXÃO
        require_once __DIR__.'/../../../resources/views/php_action/db_connect.php';

        if(isset($_POST['btn-deletar'])){
            $id = mysqli_escape_string($connect, $_POST['id']);

            $sql = "DELETE FROM clientes WHERE id = '$id'";

            if(mysqli_query($connect, $sql)){
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
