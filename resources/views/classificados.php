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
  <a href="/morador/adicionar" class="btn"> Adicionar morador</a>
  <a href="/classificado/adicionar" class="btn purple"> Adicionar classificado</a>
  <a href="/api/fornecedor" class="btn"> Acessar API</a>
  </div>
</div>

<div class="row">
  <div class="col s12 m6 push-m3">
  <h3 class="light">Classificados</h3> 
    <?php
        if($classificados) {
          foreach($classificados as $classificado) {
      ?>
       <div class="row">
        <div class="col s12 m7">
          <div class="card">
            <div class="card-image">
              <img src="<?php include_once '../../public/img/Classificados/r8.jpg' ?>">
              <span class="card-title"><?php echo $classificado->titulo_classificado ?></span>
            </div>
            <div class="card-content">
              <p><?php echo $classificado->descricao_classificado ?></p>
            </div>
            <div class="card-action">
             <a href="#modal<?php echo $classificado->id; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a>
             <a href="/classificado/editar?id=<?php echo $classificado->id; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a>
            </div>
          </div>
        </div>
      </div>

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
      
      <?php
          }
        } else {
      ?>
           <div class="row">
            <div class="col s12 m7">
              <div class="card">
                <div class="card-image">
                  <img src="images/sample-1.jpg">
                  <span class="card-title">Card Title</span>
                </div>
                <div class="card-content">
                  <p>Sem classificados no momento</p>
                </div>
              </div>
            </div>
          </div>
      <?php 
        }      
      ?>
  <a href="/morador/adicionar" class="btn"> Adicionar morador</a>
  <a href="/classificado/adicionar" class="btn purple"> Adicionar classificado</a>
  <a href="/api/fornecedor" class="btn"> Acessar API</a>
  </div>
</div>

<?php
include_once 'includes/footer.php';
?>