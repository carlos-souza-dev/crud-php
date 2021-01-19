<?php 

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    
    public function login () {
    
        return view("index");
    }

    public function logout () {
    
        session_start();
        session_unset();
        session_destroy();
        $mensagem = 'Sessão finalizada!';
        return view('index', ['mensagem' => $mensagem]);
    }

    public function register () {
       
        return view("morador-add");
    }

    public function store() {

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
            $pass = filter_input(INPUT_POST, 'pass');
            if(strlen($pass) < 5){
                $error = "Sua senha deve ter no minimo 5 caracteres.";
            }
            $confirmpass = filter_input(INPUT_POST, 'confirmpass');
            if(!isset($confirmpass)){
                $error = "É preciso confirmar a senha.";
            }
            $idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);
            if(!filter_var($idade, FILTER_VALIDATE_INT)){
                $error = "A idade precisa ser um inteiro";
            }
            $bloco = filter_input(INPUT_POST, 'bloco', FILTER_SANITIZE_SPECIAL_CHARS);
            if(!$bloco){
                $error = "O bloco é obrigatório";
            }
            $apto = filter_input(INPUT_POST, 'apto', FILTER_SANITIZE_NUMBER_INT);
            if(!filter_var($apto, FILTER_VALIDATE_INT)){
                $error = "A apto precisa ser um inteiro";
            }

            if(!$error) {

                if($pass == $confirmpass) {
                    
                    if(($bloco == 'Chile' || 'Mexico') && $apto < 100){

                        $safepass = password_hash($pass, PASSWORD_DEFAULT);
                        DB::insert("INSERT INTO apartamento (bloco, apartamento) VALUES ('$bloco', '$apto')");
                        $id = DB::getPdo()->lastInsertId();
                        DB::insert("INSERT INTO morador (nome, sobrenome, email ,senha , idade, id_apto) VALUES ('$nome', '$sobrenome', '$email', '$safepass', '$idade', '$id')");
                        $_SESSION['mensagem'] = 'Cadastro realizado com sucesso!';
                        return redirect("/");
                    } else {
                        $_SESSION['mensagem'] = 'Bloco ou Apartamento inválido!';
                        return redirect("/");
                    }

                } else {
                    $_SESSION['mensagem'] = 'As senhas são diferentes!';
                    // return view("morador-add");
                    return response()->json(["Error" => "As senhas são invalidas"]);
                }

            } else {
                $_SESSION['mensagem'] = $error;
                return redirect("/");
            }            
        }
    }

    public function getHome () {
        
        $moradores = DB::select("SELECT m.id, m.nome, m.sobrenome, m.email, m.idade, a.bloco, a.apartamento, m.id_apto FROM morador m INNER JOIN apartamento a WHERE a.id = m.id_apto");
        $classificados = DB::select("SELECT * FROM classificado");
        return view("home", ['moradores' => $moradores, 'classificados' => $classificados]);
    }

    public function home () {

        session_start();
         if(isset($_POST['btn-logar'])){
             $error = [];             
             $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
             if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error = "E-mail inválido";
            }
            $pass = filter_input(INPUT_POST, 'pass');
            if(isset($pass)){
                 $error = "Preencha o campo senha";
             }

             $user = DB::select("SELECT id, nome, senha FROM morador WHERE email = '$email'");
             
            if(count($user) > 0){
                if (Hash::check($pass, $user[0]->senha)) {
                    $_SESSION['logged'] = True;
                    $_SESSION['id'] = $user[0]->id; 
                    $_SESSION['user'] = $user[0]->nome; 
                    $_SESSION['mensagem'] = "Bem vindo, ".$user[0]->nome; 
                    
                    
                    $moradores = DB::select("SELECT m.id, m.nome, m.sobrenome, m.email, m.idade, a.bloco, a.apartamento, m.id_apto FROM morador m INNER JOIN apartamento a WHERE a.id = m.id_apto");
                    $classificados = DB::select("SELECT * FROM classificado");
                    return view("home", ['moradores' => $moradores, 'classificados' => $classificados]);
                
                } else {
                
                    $_SESSION['mensagem'] = 'Usuário ou senha inválido.'; 
                    return view('index',['moradores' => '', 'classificados' => '']);
                }
            } else {
                
                $_SESSION['mensagem'] = 'Usuário ou senha inválido.'; 
                return view('index',['moradores' => '', 'classificados' => '']);
            }
        }
    }
   
}

?>