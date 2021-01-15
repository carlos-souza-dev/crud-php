<?php
// HEADER -->
include_once 'includes/header.php';
// Mensagem
include_once 'includes/mensagem.php';
?>

<div class="row">
  <div class="col s12 m6 push-m3">
  <h3 class="light">Moradores</h3> 
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
        if($moradores) {
          foreach($moradores as $morador) {
      ?>
           <tr>
             <td><?php echo $morador->nome ?></td>
             <td><?php echo $morador->sobrenome ?></td>
             <td><?php echo $morador->email ?></td>
             <td><?php echo $morador->idade ?></td>
             <td><a href="/editar?id=<?php echo $morador->id; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
             <td><a href="#modal<?php echo $morador->id; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

             <!-- Modal Structure -->
              <div id="modal<?php echo $morador->id; ?>" class="modal">
                <div class="modal-content">
                  <h4>Opa!</h4>
                  <p>Tem certeza que deseja excluir esse morador?</p>
                </div>
                <div class="modal-footer">

                  <form action="/deletar" method="POST">
                    <input type="hidden" name="id" value="<?php echo $morador->id; ?>">
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
    <a href="/adicionar" class="btn"> Adicionar morador</a>
    <a href="/api/fornecedor" class="btn"> Acessar API</a>

<?php
include_once 'includes/footer.php';
?>