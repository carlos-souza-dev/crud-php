<?php 
// HEADER
include_once 'includes/header.php';
?>
<div class="row">
  <div class="col s12 m6 push-m3">
  <h3 class="light">Editar Cliente</h3> 
    <form action="/editar" method="POST">
    <?php
        if($cliente) {
          foreach($cliente as $row) {
    ?>
        <input type="hidden" name="id" value="<?php echo $row->id; ?>">
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

        <div class="input-field col s12">
            <input type="text" name="idade" id="idade"  value="<?php echo $row->idade; ?>">
            <label for="idade"> Idade </label>
        </div>

        <button type="submit" name="btn-editar" class="btn"> Atualizar </button>
        <a href="index.php" class="btn green"> Lista de Clientes </a>
    </form>
  </div>
</div>
<?php
        }
    }
include_once 'includes/footer.php';
?>