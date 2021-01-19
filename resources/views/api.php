<?php
if(!isset($_SESSION['logged'])) {
  session_start();
  echo "Sessão iniciada.";
}
// HEADER -->
include_once 'includes/header.php';
// Menu
include_once 'includes/menu.php';

?>

<div class="row">
  <div class="col s12 m6 push-m3">
  <h3 class="light">Clitentes</h3> 
    <table class="striped">
      <thead>
        <tr>
          <th>Nome:</th>
          <th>Email</th>
          <th>Idade:</th>
        </tr>
      </thead>
      <tbody>
      <?php
        if($fornecedores) {
          foreach($fornecedores as $fornecedor) {
      ?>
           <tr>
             <td><?php echo $fornecedor->nome ?></td>
             <td><?php echo $fornecedor->cnpj ?></td>
             <td><?php echo $fornecedor->email ?></td>
             <td><a href="/editar?id=<?php echo $fornecedor->id; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
             <td><a href="#modal<?php echo $fornecedor->id; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

             <!-- Modal Structure -->
              <div id="modal<?php echo $fornecedor->id; ?>" class="modal">
                <div class="modal-content">
                  <h4>Opa!</h4>
                  <p>Tem certeza que deseja excluir esse fornecedor?</p>
                </div>
                <div class="modal-footer">

                  <form action="/deletar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $fornecedor->id; ?>">
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
include_once 'includes/footer.php';
?>