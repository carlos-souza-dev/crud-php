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
  <h3 class="light">Editar Morador</h3> 
    <form action="/morador/editar" method="POST">
    <?php
        if($morador) {
          foreach($morador as $row) {
    ?>
        <input type="hidden" name="id" value="<?php echo $row->id; ?>">
        <input type="hidden" name="id_apto" value="<?php echo $row->id_apto; ?>">
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $row->nome; ?>">
                <label for="nome"> Nome </label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome"  value="<?php echo $row->sobrenome; ?>">
                <label for="sobrenome"> Sobrenome </label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="email" id="email"  value="<?php echo $row->email; ?>">
                <label for="email"> E-mail </label>
            </div>

            <div class="input-field col 6">
                <input type="text" name="idade" id="idade"  value="<?php echo $row->idade; ?>">
                <label for="idade"> Idade </label>
            </div>

            <div class="input-field col s3">
                <input type="text" name="bloco" id="bloco"  value="<?php echo $row->bloco; ?>">
                <label for="bloco"> Bloco </label>
            </div>

            <div class="input-field col s3">
                <input type="text" name="apto" id="apto"  value="<?php echo $row->apartamento; ?>">
                <label for="apto"> Apartamento </label>
            </div>
        </div>

        <button type="submit" name="btn-editar" class="btn"> Atualizar </button>
        <a href="/" class="btn green"> Lista de Moradores </a>
    </form>
  </div>
</div>
<?php
        }
    }
include_once 'includes/footer.php';
?>