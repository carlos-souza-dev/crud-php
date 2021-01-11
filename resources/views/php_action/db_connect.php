<?php

$servername = "localhost";
$user = "aluno";
$password = "123";
$database = "crud";
$table = "clientes";

global $connect;
$connect = mysqli_connect($servername, $user, $password, $database);
mysqli_set_charset($connect, "utf8");

if(mysqli_connect_error()){
    echo "Erro na conexão: ".mysqli_connect_error();
}

/*
// Outra forma de conectar o banco [Mais utilizadas para POO]
try {
  $db = new PDO("mysql:host=$servername;dbname=$database", $user, $password);
  echo "<h2>TODO</h2><ol>";
  
  $query = "SELECT * FROM $table";
  foreach($db->query($query) as $row) {
    //   foreach($db->query("SELECT * FROM $table") as $row) {
      echo "<li> Nome: " . $row['nome'] ."</li>";
    }
    echo "</ol>";
  } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
  }
  */

  // mysqli_close($connect);

  ?>