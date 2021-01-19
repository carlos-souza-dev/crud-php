<?php
// HEADER -->
include_once 'includes/header.php';
// Menu
include_once 'includes/menu.php';

?>



<div class="row">
  <div class="col s12 m6 push-m3">
  <h3 class="light">Classificados</h3> 
    <?php
        if($classificados) {
          foreach($classificados as $classificado) {
      ?>
       <div class="row">
        <div class="row s12 m7">
          <div class="card">
            <div class="card-content">
              <span class="card-title"><?php echo $classificado->titulo_classificado; ?></span>
              <p><?php echo $classificado->descricao_classificado; ?></p>
            </div>
            <div class="card-action">
              <a href="/morador/editar?id=<?php echo $classificado->id; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a>
              <a href="#modal<?php echo $classificado->id; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Structure -->
      <div id="modal<?php echo $classificado->id; ?>" class="modal">
        <div class="modal-content">
          <h4>Opa!</h4>
          <p>Tem certeza que deseja excluir esse classificado?</p>
        </div>
        <div class="modal-footer">

          <form action="/morador/deletar" method="POST">
            <input type="hidden" name="id" value="<?php echo $classificado->id; ?>">
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
        <div class="row s12 m7">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Sem classificados</span>
              <p>Sem classificados</p>
            </div>
          </div>
        </div>
      </div>
      <?php 
        }      
      ?>
  
  <a href="/classificado/adicionar" class="btn purple"><i class="material-icons left">add</i>Classificado</a>
  </div>
</div>

<?php
include_once 'includes/footer.php';
?>