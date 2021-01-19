<?php
// HEADER -->
include_once 'includes/header.php';
// Mensagem
include_once 'includes/mensagem.php';
?>

<div class="col s12 m6 push-m3">
  <p>Olá, <?php echo $_SESSION['user']; ?></p>
</div>
<div class="col s12 m6 push-m3">
  <a  href="/sair" class="waves-effect waves-light btn right"><i class="material-icons left">exit_to_app</i>Sair</a>
</div>
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
          <th>Apartamento:</th>
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
             <td><?php echo $morador->bloco. ' - '.$morador->apartamento ?></td>
             <td><a href="/morador/editar?id=<?php echo $morador->id; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
             <td><a href="#modal<?php echo $morador->id; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

             <!-- Modal Structure -->
              <div id="modal<?php echo $morador->id; ?>" class="modal">
                <div class="modal-content">
                  <h4>Opa!</h4>
                  <p>Tem certeza que deseja excluir esse morador?</p>
                </div>
                <div class="modal-footer">

                  <form action="/morador/deletar" method="POST">
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
             <td style="text-align: center;">-</td>
          </tr>
      <?php 
        }      
      ?>
      </tbody>
    </table>
  <a href="/morador/cadastrar" class="btn purple"><i class="material-icons left">add</i>Morador</a>
  <a href="/morador" class="btn"> Morador </a>
  <a href="/api/fornecedor" class="btn"> Acessar API</a>
  </div>
</div>

<div class="row">
  <div class="col s12 m6 push-m3">
  <h3 class="light">Classificados</h3> 
    <table class="striped">
      <thead>
        <tr>
          <th>Nome:</th>
          <th>Sobrenome</th>
        </tr>
      </thead>
      <tbody>
      <?php
        if($classificados) {
          foreach($classificados as $classificado) {
      ?>
           <tr>
             <td><?php echo $classificado->titulo_classificado ?></td>
             <td><?php echo $classificado->descricao_classificado ?></td>
             <td><a href="/classificado/editar/<?php echo $classificado->id; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
             <td><a href="#modal<?php echo $classificado->id; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

             <!-- Modal Structure -->
              <div id="modal<?php echo $classificado->id; ?>" class="modal">
                <div class="modal-content">
                  <h4>Opa!</h4>
                  <p>Tem certeza que deseja excluir esse classificado?</p>
                </div>
                <div class="modal-footer">

                  <form action="/classificado/deletar/<?php echo $classificado->id; ?>" method="POST">
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
          </tr>
      <?php 
        }      
      ?>
      </tbody>
    </table>
    <a href="/classificado/adicionar" class="btn purple"><i class="material-icons left">add</i>Classificado</a>
    <a href="/classificado" class="btn"> Classificados </a>
    <a href="/api/fornecedor" class="btn"> Acessar API</a>
  </div>
</div>

<?php
include_once 'includes/footer.php';
?>