<?php
// CONEXÃO 
require_once __DIR__.'/php_action/db_connect.php';

include_once 'php_action/db_connect.php';
// HEADER -->
include_once 'includes/header.php';
// Mensagem
include_once 'includes/mensagem.php';
?>

<div class="row">
  <div class="col s12 m6 push-m3">
  <h3 class="light">Clitentes</h3> 
    <table class="striped">
      <thead>
        <tr>
          <th>Nome:</th>
          <th>Sobrenome</th>
          <th>Email</th>
          <th>Idade:</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $sql = "SELECT * FROM clientes";

        global $connect;
        $clientes = mysqli_query($connect, $sql);
        // $result = db::select("SELECT * FROM clientes");

        if($clientes) {
          foreach($clientes as $cliente) {
      ?>
           <tr>
             <td><?php echo $cliente['nome']; ?></td>
             <td><?php echo $cliente['sobrenome']; ?></td>
             <td><?php echo $cliente['email']; ?></td>
             <td><?php echo $cliente['idade']; ?></td>
             <td><a href="/editar?id=<?php echo $cliente['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
             <td><a href="#modal<?php echo $cliente['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

             <!-- Modal Structure -->
              <div id="modal<?php echo $cliente['id']; ?>" class="modal">
                <div class="modal-content">
                  <h4>Opa!</h4>
                  <p>Tem certeza que deseja excluir esse cliente?</p>
                </div>
                <div class="modal-footer">

                  <form action="/deletar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
                    <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                    <a href="#!" class="btn modal-action modal-close waves-effect waves-green btn-flat gray">Cancelar</a>
                  </form>

                </div>
              </div>
           </tr>
      
      <?php
          }
        } else {
      ?>
          <tr>
             <td style="text-align: center;">-</td>
             <td style="text-align: center;">-</td>
             <td style="text-align: center;">-</td>
             <td style="text-align: center;">-</td>
          </tr>
      <?php 
        }      
      ?>
      </tbody>
    </table>
    <br>
    <a href="/adicionar" class="btn"> Adicionar cliente</a>

<?php

  mysqli_close($connect);
include_once 'includes/footer.php';
?>