<?php 
// HEADER -->
include_once 'includes/header.php';
// Menu
include_once 'includes/menu.php';

?>


<div class="row">
  <div class="col s12 m6 push-m3">
  <h3 class="light">Editar Classificado</h3> 
    <?php
        if($classificado) {
    ?>
    <form action="/classificado/editar/<?php echo $classificado->id; ?>" method="POST">
        <div class="input-field col s2">
            <input type="text" name="id_morador" id="id_morador" value="<?php echo $classificado->id_morador ?>">
            <label for="id_morador"> Morador </label>
        </div>

        <div class="input-field col s3">
            <input type="text" name="titulo_classificado" id="titulo_classificado" value="<?php echo $classificado->titulo_classificado ?>">
            <label for="titulo_classificado"> Titulo </label>
        </div>

        <div class="input-field col s7">
            <input type="text" name="descricao_classificado" id="descricao_classificado" value="<?php echo $classificado->descricao_classificado ?>">
            <label for="descricao_classificado"> Descrição </label>
        </div>
        <button type="submit" class="btn"> Atualizar </button>
        <a href="/" class="btn green"> Home </a>
    </form>
  </div>
</div>
<?php
        }
    include_once 'includes/footer.php';
?>